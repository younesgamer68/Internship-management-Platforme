<?php

use App\Livewire\Admin\UsersTable;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->company = Company::factory()->create([
        'name' => 'Acme Corp',
        'slug' => 'acme-corp',
        'onboarding_completed_at' => now(),
    ]);

    $this->adminUser = User::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'System Admin',
        'email' => 'admin@acme.com',
        'role' => 'admin',
    ]);
});

test('admin can see the users table component on the users page', function () {
    $this->actingAs($this->adminUser)
        ->get(route('admin.users', ['company' => $this->company->slug]))
        ->assertOk()
        ->assertSeeLivewire(UsersTable::class);
});

test('admin can search and filter users', function () {
    $user1 = User::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'Alice Student',
        'email' => 'alice@acme.com',
        'role' => 'intern',
    ]);

    $user2 = User::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'Bob Manager',
        'email' => 'bob@acme.com',
        'role' => 'company_manager',
    ]);

    Livewire::actingAs($this->adminUser)
        ->test(UsersTable::class)
        ->assertSee('Alice Student')
        ->assertSee('Bob Manager')
        // Test search
        ->set('search', 'Alice')
        ->assertSee('Alice Student')
        ->assertDontSee('Bob Manager')
        // Test search reset and role filter
        ->set('search', '')
        ->set('roleFilter', 'Company')
        ->assertSee('Bob Manager')
        ->assertDontSee('Alice Student');
});

test('admin can create a user', function () {
    Livewire::actingAs($this->adminUser)
        ->test(UsersTable::class)
        ->set('name', 'Charlie New')
        ->set('email', 'charlie@acme.com')
        ->set('role', 'intern')
        ->set('companyId', $this->company->id)
        ->set('password', 'secretpassword123')
        ->set('bio', 'New intern profile notes')
        ->call('createUser')
        ->assertHasNoErrors()
        ->assertDispatched('show-toast', message: 'User created successfully!', type: 'success');

    $this->assertDatabaseHas('users', [
        'name' => 'Charlie New',
        'email' => 'charlie@acme.com',
        'role' => 'intern',
    ]);

    $user = User::where('email', 'charlie@acme.com')->first();
    $this->assertDatabaseHas('intern_profiles', [
        'user_id' => $user->id,
        'bio' => 'New intern profile notes',
    ]);
});

test('admin can update a user', function () {
    $user = User::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'Diana Old',
        'email' => 'diana@acme.com',
        'role' => 'intern',
    ]);

    Livewire::actingAs($this->adminUser)
        ->test(UsersTable::class)
        ->call('openEditModal', $user->id)
        ->assertSet('name', 'Diana Old')
        ->set('name', 'Diana Updated')
        ->set('status', 'Inactive')
        ->call('updateUser')
        ->assertHasNoErrors()
        ->assertDispatched('show-toast', message: 'User updated successfully!', type: 'success');

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Diana Updated',
    ]);

    // Verify soft-deleting was executed since status was set to Inactive
    $user->refresh();
    $this->assertTrue($user->trashed());
});

test('admin can soft-delete a user', function () {
    $user = User::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'Ethan Delete',
        'email' => 'ethan@acme.com',
        'role' => 'intern',
    ]);

    Livewire::actingAs($this->adminUser)
        ->test(UsersTable::class)
        ->call('openDeleteModal', $user->id)
        ->set('deleteConfirmCheckbox', true)
        ->call('deleteUser')
        ->assertHasNoErrors()
        ->assertDispatched('show-toast', message: 'User deleted successfully.', type: 'danger');

    $user->refresh();
    $this->assertTrue($user->trashed());
});

test('admin can download csv export of users', function () {
    $response = Livewire::actingAs($this->adminUser)
        ->test(UsersTable::class)
        ->call('export');

    expect($response->effects['download'])->not->toBeEmpty();
});

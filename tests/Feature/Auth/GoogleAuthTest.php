<?php

use App\Models\Company;
use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;

beforeEach(function (): void {
    config([
        'services.google.client_id' => 'test-google-client-id',
        'services.google.client_secret' => 'test-google-client-secret',
        'services.google.redirect' => 'http://interhship_plat.test/auth/google/callback',
    ]);
});

it('does not start google oauth when credentials are missing', function () {
    config([
        'services.google.client_id' => null,
        'services.google.client_secret' => null,
    ]);

    $response = $this->get(route('google.login'));

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('email');
});

it('redirects invited pending users to set password when logging in with google', function () {
    $company = Company::factory()->create();
    $invitedOperator = User::factory()->operator()->create([
        'company_id' => $company->id,
        'password' => null,
        'email_verified_at' => null,
        'google_id' => null,
    ]);

    $socialiteUser = Mockery::mock(SocialiteUserContract::class);
    $socialiteUser->shouldReceive('getEmail')->andReturn($invitedOperator->email);
    $socialiteUser->shouldReceive('getName')->andReturn('Invited Operator');
    $socialiteUser->shouldReceive('getNickname')->andReturn('invited');
    $socialiteUser->shouldReceive('getId')->andReturn('google-123');
    $socialiteUser->shouldReceive('getAvatar')->andReturn('https://example.com/avatar.png');

    Socialite::shouldReceive('driver')->with('google')->andReturnSelf();
    Socialite::shouldReceive('user')->andReturn($socialiteUser);

    $response = $this->get('/auth/google/callback');

    $response->assertRedirect(route('set-password'));
    $response->assertSessionHas('pending_user_email', $invitedOperator->email);

    $this->assertGuest();
    expect($invitedOperator->fresh()->password)->toBeNull();
});

it('logs in an existing user by email without creating a duplicate account', function () {
    $companyB = Company::factory()->create();

    $existingGoogleUser = User::factory()->admin()->create([
        'company_id' => $companyB->id,
        'email' => 'existing-google@example.com',
        'google_id' => null,
        'email_verified_at' => now()->subDay(),
    ]);

    $socialiteUser = Mockery::mock(SocialiteUserContract::class);
    $socialiteUser->shouldReceive('getEmail')->andReturn($existingGoogleUser->email);
    $socialiteUser->shouldReceive('getName')->andReturn($existingGoogleUser->name);
    $socialiteUser->shouldReceive('getNickname')->andReturn('existing-google');
    $socialiteUser->shouldReceive('getId')->andReturn('google-existing-456');
    $socialiteUser->shouldReceive('getAvatar')->andReturn('https://example.com/new-avatar.png');

    Socialite::shouldReceive('driver')->with('google')->andReturnSelf();
    Socialite::shouldReceive('user')->andReturn($socialiteUser);

    $response = $this->get('/auth/google/callback');

    $response->assertRedirect(route('career_fields'));
    expect($existingGoogleUser->fresh()->google_id)->toBe('google-existing-456');
    expect(User::query()->where('email', $existingGoogleUser->email)->first())->not->toBeNull();
});

it('redirects a brand new google user to the career field step', function () {
    $socialiteUser = Mockery::mock(SocialiteUserContract::class);
    $socialiteUser->shouldReceive('getEmail')->andReturn('new-google-user@example.com');
    $socialiteUser->shouldReceive('getName')->andReturn('New Google User');
    $socialiteUser->shouldReceive('getNickname')->andReturn('new-google-user');
    $socialiteUser->shouldReceive('getId')->andReturn('google-new-789');
    $socialiteUser->shouldReceive('getAvatar')->andReturn('https://example.com/avatar.png');

    Socialite::shouldReceive('driver')->with('google')->andReturnSelf();
    Socialite::shouldReceive('user')->andReturn($socialiteUser);

    $response = $this->get('/auth/google/callback');

    $response->assertRedirect(route('career_fields'));

    expect(User::query()->where('email', 'new-google-user@example.com')->exists())->toBeTrue();
    $this->assertAuthenticated();
});

it('stores the selected career field for the authenticated user', function () {
    /** @var \App\Models\User $user */
    $user = User::factory()->create([
        'career_field' => null,
    ]);

    $response = $this->actingAs($user)->post(route('career_fields.store'), [
        'career_field' => 'Data Analytics',
    ]);

    $response->assertRedirect(route('intern.opportunities'));
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'career_field' => 'Data Analytics',
    ]);
});

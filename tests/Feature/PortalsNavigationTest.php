<?php

use App\Models\Company;
use App\Models\User;

test('authenticated intern can access student portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);
    $user = User::factory()->create([
        'company_id' => $company->id,
        'role' => 'intern',
    ]);
    
    $this->actingAs($user);

    $subPages = [
        'student.dashboard',
        'student.listings',
        'student.applications',
        'student.documents',
        'student.profile',
        'student.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertStatus(200);
    }
});

test('authenticated company manager can access company portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);
    $user = User::factory()->create([
        'company_id' => $company->id,
        'role' => 'company_manager',
    ]);
    
    $this->actingAs($user);

    $subPages = [
        'company.offers',
        'company.applicants',
        'company.interviews',
        'company.analytics',
        'company.settings',
        'company.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertStatus(200);
    }
});

test('guests are redirected to login when accessing student portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);

    $subPages = [
        'student.dashboard',
        'student.listings',
        'student.applications',
        'student.documents',
        'student.profile',
        'student.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertRedirect(route('login'));
    }
});

test('guests are redirected to login when accessing company portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);

    $subPages = [
        'company.offers',
        'company.applicants',
        'company.interviews',
        'company.analytics',
        'company.settings',
        'company.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertRedirect(route('login'));
    }
});

test('authenticated admin can access admin portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);
    $user = User::factory()->create([
        'company_id' => $company->id,
        'role' => 'admin',
    ]);
    
    $this->actingAs($user);

    $subPages = [
        'admin.users',
        'admin.universities',
        'admin.departments',
        'admin.internships',
        'admin.reports',
        'admin.settings',
        'admin.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertStatus(200);
    }
});

test('guests are redirected to login when accessing admin portal sub-pages', function () {
    $company = Company::factory()->create(['onboarding_completed_at' => now()]);

    $subPages = [
        'admin.users',
        'admin.universities',
        'admin.departments',
        'admin.internships',
        'admin.reports',
        'admin.settings',
        'admin.support',
    ];

    foreach ($subPages as $routeName) {
        $response = $this->get(route($routeName, ['company' => $company->slug]));
        $response->assertRedirect(route('login'));
    }
});

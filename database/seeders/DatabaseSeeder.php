<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\InternProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a sample company
        $company = Company::query()->updateOrCreate(
            ['slug' => 'internlink-demo'],
            [
                'name' => 'InternLink Demo',
                'email' => 'hello@internlink.test',
                'phone' => null,
                'require_client_verification' => false,
                'onboarding_completed_at' => now(),
            ]
        );

        // Create Admin user (Administrator)
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@internlink.test'],
            [
                'company_id' => $company->id,
                'name' => 'Platform Administrator',
                'password' => bcrypt('AdminPass123!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Create Company Manager user
        $manager = User::query()->updateOrCreate(
            ['email' => 'manager@internlink.test'],
            [
                'company_id' => $company->id,
                'name' => 'Company Manager',
                'password' => bcrypt('ManagerPass123!'),
                'role' => 'company_manager',
                'email_verified_at' => now(),
            ]
        );

        // Create an Intern user
        $intern = User::query()->updateOrCreate(
            ['email' => 'intern@internlink.test'],
            [
                'company_id' => $company->id,
                'name' => 'Demo Intern',
                'password' => bcrypt('InternPass123!'),
                'role' => 'intern',
                'email_verified_at' => now(),
            ]
        );

        InternProfile::query()->updateOrCreate(
            ['user_id' => $intern->id],
            [
                'company_id' => $company->id,
                'position' => 'Intern',
                'bio' => 'Demo intern account seeded for testing.',
                'start_date' => now()->toDateString(),
                'end_date' => now()->addMonths(3)->toDateString(),
            ]
        );

        $this->call(InternshipPlatformSeeder::class);

        $this->command->info('Seeded: company and demo users (admin/manager/intern)');
        $this->command->info('Admin credentials: email=admin@internlink.test password=AdminPass123!');
    }
}

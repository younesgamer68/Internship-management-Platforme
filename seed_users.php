<?php
use App\Models\User;
use App\Models\Company;
use App\Models\UserInfo;
use App\Models\University;

$company = Company::where('slug', 'internlink-demo')->first();
$companyId = $company ? $company->id : 1;

User::updateOrCreate(
    ['email' => 'admin@internlink.test'],
    [
        'company_id' => $companyId,
        'name' => 'Platform Administrator',
        'password' => bcrypt('AdminPass123!'),
        'role' => 'admin',
        'email_verified_at' => now(),
    ]
);

User::updateOrCreate(
    ['email' => 'manager@internlink.test'],
    [
        'company_id' => $companyId,
        'name' => 'Company Manager',
        'password' => bcrypt('ManagerPass123!'),
        'role' => 'company_manager',
        'email_verified_at' => now(),
    ]
);

$faker = \Faker\Factory::create();
$universities = University::pluck('id')->toArray();

for ($i = 0; $i < 50; $i++) {
    $user = User::create([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'role' => 'intern',
        'university_id' => !empty($universities) ? $universities[array_rand($universities)] : null,
        'email_verified_at' => now(),
    ]);

    UserInfo::create([
        'user_id' => $user->id,
        'first_name' => explode(' ', $user->name)[0] ?? 'First',
        'last_name' => explode(' ', $user->name)[1] ?? 'Last',
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->date(),
        'country' => $faker->country,
        'city' => $faker->city,
        'gender' => 'Other',
        'university' => $faker->company,
        'degree' => 'Bachelors',
        'field_of_study' => 'Computer Science',
        'education_start_year' => 2020,
        'education_end_year' => 2024,
        'gpa' => '3.5',
        'experience' => 'Some experience',
        'skills' => 'PHP, Laravel',
        'linkedin_url' => 'https://linkedin.com',
        'portfolio_url' => 'https://github.com',
        'resume_path' => 'resume.pdf',
        'motivation' => 'Highly motivated',
        'preferred_start_date' => now()->toDateString(),
        'availability' => 'Full-time',
        'referral_source' => 'Internet',
        'status' => 'Pending',
    ]);
}
echo "Seeded successfully.\n";

<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Internship;
use App\Models\Company;
use Illuminate\Support\Str;

$companies = Company::take(5)->get();
if($companies->isEmpty()) {
    $company = Company::create(['name' => 'Tech Corp', 'slug' => 'tech-corp']);
    $companies->push($company);
}

$types = ['Remote', 'Onsite', 'Hybrid'];
$fields = ['Engineering', 'Marketing', 'Design', 'Data Science', 'HR'];
$statuses = ['Open', 'Closed', 'Draft'];

for ($i = 0; $i < 15; $i++) {
    $title = 'Internship Role ' . rand(1000, 9999);
    Internship::create([
        'title' => $title,
        'slug' => Str::slug($title) . '-' . rand(100, 999),
        'company_id' => $companies->random()->id,
        'description' => 'A great opportunity for learning.',
        'field' => $fields[array_rand($fields)],
        'internship_type' => $types[array_rand($types)],
        'duration' => rand(1, 6) . ' months',
        'deadline' => now()->addDays(rand(10, 60)),
        'status' => $statuses[array_rand($statuses)],
        'location' => 'City ' . rand(1, 10),
        'skills_required' => ['PHP', 'Laravel', 'JS'],
    ]);
}

echo "15 internships seeded successfully!\n";

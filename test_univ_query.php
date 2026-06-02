<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
try {
    $universities = \App\Models\University::withCount('students')
        ->withCount('departments')
        ->withCount(['applications as internships_count' => function ($query) {
            $query->whereIn('applications.status', ['accepted', 'hired', 'active']);
        }])
        ->orderBy('id', 'desc')->get();
    echo "Universities retrieved: " . $universities->count() . "\n";
    if($universities->count() > 0) {
        $u = $universities->first();
        echo "First University Students: " . $u->students_count . "\n";
        echo "First University Internships: " . $u->internships_count . "\n";
        echo "First University Departments: " . $u->departments_count . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

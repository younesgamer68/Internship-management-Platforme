<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
try {
    $count = \App\Models\Department::withCount('students')
        ->withCount(['applications as active_internships_count' => function ($q) { 
            $q->whereIn('applications.status', ['accepted', 'hired', 'active']); 
        }])
        ->count();
    echo "Count: " . $count . "\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

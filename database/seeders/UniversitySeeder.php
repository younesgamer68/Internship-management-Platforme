<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\University::truncate();

        $cities = ['Tirana', 'Durres', 'Shkoder', 'Vlore', 'Elbasan', 'Korce', 'Gjirokaster'];
        $statuses = ['Active', 'Active', 'Active', 'Pending', 'Inactive']; // Weighted towards Active

        $universities = [
            'Epoka University', 'Albanian University', 'University of Tirana', 'Polytechnic University',
            'Beder University', 'UET Tirana', 'New York University Tirana', 'Canadian Institute of Technology',
            'Metropolitan University Tirana', 'Aleksander Moisiu University', 'Luigj Gurakuqi University',
            'Ismail Qemali University', 'Aleksander Xhuvani University', 'Fan Noli University',
            'Eqrem Cabej University', 'Our Lady of Good Counsel', 'Luarasi University', 'Barleti University',
            'Wisdom University College', 'Tirana Business University', 'Agricultural University of Tirana',
            'European University of Tirana', 'Mediterranean University', 'Sports University of Tirana',
            'Academy of Arts'
        ];

        $colors = [
            'linear-gradient(135deg,rgba(37,99,235,0.15) 0%,rgba(37,99,235,0.05) 100%)' => '#3B82F6',
            'linear-gradient(135deg,rgba(16,185,129,0.15) 0%,rgba(16,185,129,0.05) 100%)' => '#10B981',
            'linear-gradient(135deg,rgba(99,102,241,0.15) 0%,rgba(99,102,241,0.05) 100%)' => '#6366F1',
            'linear-gradient(135deg,rgba(245,158,11,0.15) 0%,rgba(245,158,11,0.05) 100%)' => '#F59E0B',
            'linear-gradient(135deg,rgba(239,68,68,0.15) 0%,rgba(239,68,68,0.05) 100%)' => '#EF4444',
            'linear-gradient(135deg,rgba(6,182,212,0.15) 0%,rgba(6,182,212,0.05) 100%)' => '#06B6D4',
            'linear-gradient(135deg,rgba(236,72,153,0.15) 0%,rgba(236,72,153,0.05) 100%)' => '#EC4899',
            'linear-gradient(135deg,rgba(14,165,233,0.15) 0%,rgba(14,165,233,0.05) 100%)' => '#0EA5E9',
            'linear-gradient(135deg,rgba(139,92,246,0.15) 0%,rgba(139,92,246,0.05) 100%)' => '#8B5CF6',
        ];

        foreach ($universities as $index => $name) {
            $city = $cities[array_rand($cities)];
            // Hardcode known cities for some universities
            if (strpos($name, 'Tirana') !== false || in_array($name, ['Epoka University', 'Albanian University'])) $city = 'Tirana';
            if (strpos($name, 'Moisiu') !== false) $city = 'Durres';
            if (strpos($name, 'Gurakuqi') !== false) $city = 'Shkoder';
            if (strpos($name, 'Qemali') !== false) $city = 'Vlore';

            $colorKeys = array_keys($colors);
            $grad = $colorKeys[array_rand($colorKeys)];
            $textColor = $colors[$grad];

            $website = strtolower(str_replace(' ', '', str_replace('University', '', $name))) . '.edu.al';

            \App\Models\University::create([
                'name' => $name,
                'students_count' => rand(100, 1000),
                'color' => $grad,
                'icon' => $textColor, // we'll use 'icon' column to store the text color to match UI
                'completion_percentage' => rand(30, 95),
                'city' => $city,
                'website' => $website,
                'status' => $statuses[array_rand($statuses)],
                'faculties_count' => rand(2, 10),
                'internships_count' => rand(5, 60),
                'departments_count' => rand(4, 25),
            ]);
        }
    }
}

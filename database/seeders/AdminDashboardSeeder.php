<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminDashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\University::truncate();
        \App\Models\Department::truncate();
        \App\Models\ActivityLog::truncate();
        \App\Models\PlatformMetric::truncate();

        $universities = [
            ['Epoka University', 580, '#3B82F6', 'fa-shield-alt', 78],
            ['University of Tirana', 720, '#8B5CF6', 'fa-landmark', 95],
            ['Albanian University', 450, '#F59E0B', 'fa-university', 61],
            ['Polytechnic University', 670, '#10B981', 'fa-building-columns', 90],
            ['UET Tirana', 390, '#EF4444', 'fa-graduation-cap', 55],
            ['Luigj Gurakuqi Shkoder', 210, '#0ea5e9', 'fa-book-open', 42],
            ['New York University Tirana', 150, '#EC4899', 'fa-school', 31],
            ['Canadian Institute of Tech', 180, '#14B8A6', 'fa-laptop-code', 38],
            ['Metropolitan Univ. Tirana', 220, '#6366F1', 'fa-gears', 46],
        ];

        foreach ($universities as $uni) {
            \App\Models\University::create([
                'name' => $uni[0],
                'students_count' => $uni[1],
                'color' => $uni[2],
                'icon' => $uni[3],
                'completion_percentage' => $uni[4]
            ]);
        }

        // Just create some dummy departments so we have 38 in total
        $firstUni = \App\Models\University::first();
        if ($firstUni) {
            for ($i = 1; $i <= 38; $i++) {
                \App\Models\Department::create([
                    'name' => 'Department ' . $i,
                    'university_id' => $firstUni->id
                ]);
            }
        }

        $activities = [
            ['fa-user-plus','#00b1aa','New user registered','John Smith joined as Student','2 min ago'],
            ['fa-briefcase','#3B82F6','Internship submitted','Software Dev at TechSolutions','15 min ago'],
            ['fa-check-circle','#10B981','Report approved','Emily Davis – UI/UX Internship','1 hr ago'],
            ['fa-exclamation-triangle','#F59E0B','Approval pending','Marketing role at MediaCorp','2 hr ago'],
            ['fa-trash-alt','#EF4444','User removed','Inactive account cleaned up','3 hr ago'],
            ['fa-handshake','#6366F1','New Partnership','Signed with Epoka University','4 hr ago'],
            ['fa-circle-check','#14B8A6','Company Approved','CloudStack Ltd verification passed','5 hr ago'],
            ['fa-file-signature','#ec4899','Application Sent','Elena Hoxha applied to DataSpark','6 hr ago'],
            ['fa-user-tie','#8B5CF6','Coordinator Assigned','Dr. Arben Kola at Univ. of Tirana','7 hr ago'],
            ['fa-star','#F59E0B','Feedback Submitted','MediaCorp rated program 5 stars','8 hr ago'],
        ];

        foreach ($activities as $act) {
            \App\Models\ActivityLog::create([
                'icon' => $act[0],
                'color' => $act[1],
                'title' => $act[2],
                'description' => $act[3],
                'time_ago' => $act[4]
            ]);
        }

        $metrics = [
            ['pending_approvals', '45'],
            ['reports_submitted', '128'],
            ['internships_completed', '275'],
            ['avg_satisfaction', '4.8'],
            ['active_internships', '320'],
            ['total_students', '2450']
        ];

        foreach ($metrics as $m) {
            \App\Models\PlatformMetric::create([
                'key' => $m[0],
                'value' => $m[1]
            ]);
        }
    }
}

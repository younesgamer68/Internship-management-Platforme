<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecentActivitySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Business', 'Computer Science & IT', 'Creative, Design & Fashion',
            'Engineering', 'Entrepreneurship & Startups', 'Finance',
            'Green Tech & Sustainability', 'Health, Wellness & Sports Management',
            'Healthcare & Pharmaceutical', 'Hospitality, Tourism & Events',
            'International Dev, NGOs & Charity', 'Legal', 'Logistics & Supply Chain',
            'Marketing', 'Media, Communications & Publishing', 'Real Estate',
            'Recruitment & HR', 'Urban Planning & Architecture', 'UI/UX Design',
            'Product Management',
        ];

        $fakeNames = [
            'Amina', 'Liam', 'Noor', 'Daniel', 'Sofia', 'Youssef', 'Maya', 'Ethan', 'Zara', 'Omar',
            'Leila', 'Ibrahim', 'Nina', 'Hugo', 'Ava', 'Samir', 'Elena', 'Lucas', 'Mila', 'Tariq',
        ];

        foreach ($categories as $index => $fieldName) {
            $internship = \App\Models\Internship::query()
                ->where('field', $fieldName)
                ->inRandomOrder()
                ->first();

            if (! $internship) {
                continue;
            }

            $fakeName = $fakeNames[$index % count($fakeNames)].' '.fake()->lastName();
            $userEmail = 'activity-'.$index.'-'.\Illuminate\Support\Str::slug($fieldName).'@internlink.test';

            $user = User::query()->updateOrCreate(
                ['email' => $userEmail],
                [
                    'company_id' => $internship->company_id,
                    'name' => $fakeName,
                    'password' => bcrypt('InternPass123!'),
                    'role' => 'intern',
                    'career_field' => $fieldName,
                    'email_verified_at' => now(),
                ]
            );

            Application::query()->updateOrCreate(
                [
                    'user_id' => $user->id,
                    'internship_id' => $internship->id,
                ],
                [
                    'status' => match ($index % 4) {
                        0 => 'Pending',
                        1 => 'approved',
                        2 => 'rejected',
                        default => 'Pending',
                    },
                    'cover_letter' => 'I would like to contribute to '.$internship->title.'.',
                    'resume_url' => null,
                    'applied_at' => now()->subMinutes($index * 7),
                ]
            );
        }
    }
}
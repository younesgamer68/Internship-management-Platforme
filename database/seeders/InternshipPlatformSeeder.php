<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternshipPlatformSeeder extends Seeder
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
            'Product Management', 'Data Analytics', 'Full Stack Development',
        ];

        $skillsList = [
            'Python', 'JavaScript', 'React', 'Node.js', 'Laravel', 'PHP', 'SQL',
            'Data Analysis', 'Project Management', 'Agile', 'Scrum', 'Figma', 'UI/UX',
            'SEO', 'Marketing', 'Content Creation', 'Sales', 'Customer Service',
            'Communication', 'Leadership', 'Problem Solving', 'Teamwork', 'Time Management',
            'Machine Learning', 'AI', 'Cyber Security', 'Cloud Computing', 'AWS', 'Docker',
            'Kubernetes', 'CI/CD', 'Git', 'GitHub', 'Linux', 'Networking', 'Accounting',
            'Finance', 'Financial Analysis', 'Excel', 'Financial Modeling', 'Legal Research',
            'Contract Law', 'Corporate Law', 'Supply Chain Management', 'Logistics',
            'Operations', 'HR', 'Recruitment', 'Talent Acquisition', 'Event Planning'
        ];

        // 1. Create Companies (if we need to generate new ones)
        // Check if there are any companies, if not, create some
        if (\App\Models\Company::count() < 20) {
            \App\Models\Company::factory(50)->create();
        }
        $companies = \App\Models\Company::all();

        // 2. Create Skills
        $createdSkills = [];
        foreach ($skillsList as $skill) {
            $createdSkills[] = \App\Models\Skill::firstOrCreate([
                'name' => $skill,
                'slug' => \Illuminate\Support\Str::slug($skill)
            ]);
        }
        $skillsCollection = collect($createdSkills);

        // 3. Create Categories and Internships
        foreach ($categories as $categoryName) {
            $category = \App\Models\InternshipCategory::firstOrCreate([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName)
            ]);

            // Create ~15 internships per category
            for ($i = 0; $i < 15; $i++) {
                $company = $companies->random();
                
                // Determine a realistic title based on category
                $title = $this->generateTitleForCategory($categoryName);

                $internship = \App\Models\Internship::factory()->create([
                    'company_id' => $company->id,
                    'title' => $title,
                    'slug' => \Illuminate\Support\Str::slug($title . '-' . uniqid()),
                    'field' => $categoryName,
                ]);

                // Attach 3-5 random skills
                $randomSkills = $skillsCollection->random(rand(3, 5))->pluck('id');
                $internship->skills()->attach($randomSkills);
                
                // Update skills_required json to match attached skills
                $internship->update([
                    'skills_required' => $skillsCollection->whereIn('id', $randomSkills)->pluck('name')->toArray()
                ]);
            }
        }
    }

    private function generateTitleForCategory($category)
    {
        $faker = \Faker\Factory::create();
        
        $titles = [
            'Computer Science & IT' => ['AI & IT Support Intern', 'Solution Engineer', 'Cyber Security App Development', 'Backend Developer Intern', 'Laravel Developer Intern', 'Software Engineering Intern', 'Cloud Infrastructure Intern', 'IT Operations Intern'],
            'Business' => ['Business Process Management', 'Market Research Intern', 'Sales Analyst Intern', 'Business Strategy Intern', 'Operations Analyst Intern', 'Management Trainee'],
            'UI/UX Design' => ['Product UI Designer', 'UX Research Intern', 'UI/UX Design Intern', 'Interaction Design Intern', 'Visual Designer Intern'],
            'Data Analytics' => ['BI Analyst Intern', 'Data Scientist Intern', 'Data Analyst Intern', 'Data Engineering Intern', 'Quantitative Analyst Intern'],
            'Marketing' => ['Digital Marketing Intern', 'Social Media Marketing Intern', 'Content Marketing Intern', 'SEO Specialist Intern', 'Brand Management Intern'],
            'Finance' => ['Financial Analyst Intern', 'Investment Banking Intern', 'Private Equity Analyst', 'Accounting Intern', 'Corporate Finance Intern'],
            'Engineering' => ['Mechanical Engineering Intern', 'Electrical Engineering Intern', 'Civil Engineering Intern', 'Robotics Intern', 'Industrial Engineering Intern'],
        ];

        if (isset($titles[$category])) {
            return $faker->randomElement($titles[$category]);
        }

        return $faker->jobTitle . ' Intern';
    }
}

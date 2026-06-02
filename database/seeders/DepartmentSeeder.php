<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\University;
use App\Models\User;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = University::all();
        if ($universities->isEmpty()) {
            return;
        }

        $faculties = [
            'Computer Science' => ['Software Engineering', 'Computer Networks', 'Information Technology', 'Cybersecurity'],
            'Economics' => ['Finance & Accounting', 'Marketing & Commerce', 'Business Administration', 'Economics'],
            'Engineering' => ['Civil Engineering', 'Electrical Engineering', 'Mechanical Engineering', 'Industrial Engineering'],
            'Natural Sciences' => ['Physics & Mathematics', 'Chemistry', 'Biology', 'Environmental Science'],
            'Health Sciences' => ['Public Health', 'Nursing', 'Pharmacy', 'Medicine'],
            'Law' => ['Criminal Law', 'Civil Law', 'International Law'],
        ];

        $faker = \Faker\Factory::create();
        
        foreach ($universities as $university) {
            // Pick 2-4 random faculties for each university
            $universityFaculties = array_rand($faculties, rand(2, 4));
            if (!is_array($universityFaculties)) {
                $universityFaculties = [$universityFaculties];
            }

            foreach ($universityFaculties as $facultyName) {
                $departmentNames = $faculties[$facultyName];
                // Create 1-3 departments per faculty
                $pickedDepts = array_rand(array_flip($departmentNames), rand(1, count($departmentNames)));
                if (!is_array($pickedDepts)) {
                    $pickedDepts = [$pickedDepts];
                }

                foreach ($pickedDepts as $deptName) {
                    $department = Department::create([
                        'name' => $deptName,
                        'faculty' => $facultyName,
                        'university_id' => $university->id,
                        'head_name' => 'Dr. ' . $faker->firstName . ' ' . $faker->lastName,
                        'status' => $faker->randomElement(['active', 'active', 'active', 'pending', 'inactive']),
                    ]);
                }
            }
        }

        // Randomly assign students to departments
        $students = User::where('role', 'intern')->get();
        $departments = Department::pluck('id')->toArray();
        if (!empty($departments)) {
            foreach ($students as $student) {
                // Only assign if they already belong to the same university
                if ($student->university_id) {
                    $univDepts = Department::where('university_id', $student->university_id)->pluck('id')->toArray();
                    if (!empty($univDepts)) {
                        $student->department_id = $univDepts[array_rand($univDepts)];
                        $student->save();
                    }
                } else {
                    $student->department_id = $departments[array_rand($departments)];
                    $student->university_id = Department::find($student->department_id)->university_id;
                    $student->save();
                }
            }
        }
    }
}

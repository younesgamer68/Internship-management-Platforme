<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\University;

class AdminDepartmentsController extends Controller
{
    public function index($companySlug = null)
    {
        $departments = Department::orderBy('name')->get();
        $universities = University::all();
        
        $totalDepartments = $departments->count();
        $activePrograms = 142; // Fake data
        $totalStudents = \App\Models\User::where('role', 'student')->count();
        $facultyMembers = 345; // Fake data

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.departments', compact(
            'departments',
            'universities',
            'totalDepartments',
            'activePrograms',
            'totalStudents',
            'facultyMembers',
            'slug'
        ));
    }
}

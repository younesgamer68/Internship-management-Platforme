<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Department;
use App\Models\ActivityLog;
use App\Models\Internship;
use App\Models\Application;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index($companySlug = null)
    {
        $universities = University::all();
        $departmentsCount = Department::count();
        $activities = ActivityLog::orderBy('id', 'desc')->take(10)->get();
        
        $pendingApprovals = Application::where('status', 'pending')->count();
        $reportsSubmitted = 128; // Fake manual data as requested for missing tables
        $internshipsCompleted = Internship::where('status', 'Completed')->count();
        $avgSatisfaction = '4.8'; // Fake manual data
        $activeInternships = Internship::where('status', 'Active')->orWhere('status', 'Open')->count();
        $totalStudents = User::where('role', 'student')->count();
        $recentInternships = Internship::with('company')->orderBy('id', 'desc')->take(5)->get();

        // Fallback for $companySlug if missing (since routes might expect it)
        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.dashboard', compact(
            'universities', 
            'departmentsCount', 
            'activities', 
            'pendingApprovals',
            'reportsSubmitted',
            'internshipsCompleted',
            'avgSatisfaction',
            'activeInternships',
            'totalStudents',
            'recentInternships',
            'slug'
        ));
    }
}

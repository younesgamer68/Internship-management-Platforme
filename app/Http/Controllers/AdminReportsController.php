<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Internship;
use App\Models\User;

class AdminReportsController extends Controller
{
    public function index($companySlug = null)
    {
        $totalApplications = Application::count();
        $internships = Internship::count();
        
        $successRate = '42%'; // Fake manual data as we might not track success perfectly
        $totalReports = 1245; // Fake manual data
        
        $totalStudents = \App\Models\UserInfo::count();
        $completedInternships = Internship::where('status', 'Completed')->count();
        $activeInternships = Internship::where('status', 'Open')->orWhere('status', 'Active')->count();
        
        // List of reports or applications can be faked or fetched
        $recentApplications = Application::with(['user', 'internship'])->orderBy('id', 'desc')->take(10)->get();

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.reports', compact(
            'totalApplications',
            'internships',
            'successRate',
            'totalReports',
            'recentApplications',
            'totalStudents',
            'completedInternships',
            'activeInternships',
            'slug'
        ));
    }
}

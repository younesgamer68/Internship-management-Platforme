<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index($companySlug = null)
    {
        $universities = \App\Models\University::all();
        $departmentsCount = \App\Models\Department::count();
        $activities = \App\Models\ActivityLog::orderBy('id')->get();
        
        $metrics = \App\Models\PlatformMetric::all()->pluck('value', 'key');
        
        // Use generic user/internship counts to augment if needed, but since we seeded exact numbers:
        $pendingApprovals = $metrics['pending_approvals'] ?? 45;
        $reportsSubmitted = $metrics['reports_submitted'] ?? 128;
        $internshipsCompleted = $metrics['internships_completed'] ?? 275;
        $avgSatisfaction = $metrics['avg_satisfaction'] ?? '4.8';
        $activeInternships = $metrics['active_internships'] ?? 320;
        $totalStudents = $metrics['total_students'] ?? 2450;

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
            'slug'
        ));
    }}

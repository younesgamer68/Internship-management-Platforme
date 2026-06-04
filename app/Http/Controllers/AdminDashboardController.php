<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Department;
use App\Models\ActivityLog;
use App\Models\Internship;
use App\Models\Application;
use App\Models\User;
use App\Models\SupportTicket;
use App\Models\InternshipOffer;

class AdminDashboardController extends Controller
{
    public function index($companySlug = null)
    {
        $universities = University::withCount('students as students_count')->get();
        $departmentsCount = Department::count();
        
        $pendingApprovals = Application::where('status', 'pending')->count();
        $reportsSubmitted = SupportTicket::count(); // Count total tickets as compliance reports count
        $internshipsCompleted = Internship::whereIn('status', ['Completed', 'completed', 'closed', 'Closed'])->count();
        $avgSatisfaction = '4.8'; // Default rating
        $activeInternships = Internship::whereIn('status', ['Active', 'active', 'Open', 'open'])->count();
        $totalStudents = User::whereIn('role', ['student', 'intern'])->count();
        $recentInternships = Internship::with('company')->orderBy('id', 'desc')->take(5)->get();

        // Fetch activity logs, fallback to dynamic synthetic logs if table is empty
        $activities = ActivityLog::orderBy('id', 'desc')->take(10)->get();
        if ($activities->isEmpty()) {
            $synthetic = collect();
            
            // 1. Support tickets
            SupportTicket::with('user')->latest()->take(3)->get()->each(function ($ticket) use ($synthetic) {
                $name = $ticket->user->name ?? 'User';
                $synthetic->push((object)[
                    'title' => "Support Ticket #{$ticket->ticket_number}",
                    'description' => "Created by {$name}: {$ticket->subject}",
                    'icon' => 'fa-ticket',
                    'color' => '#EF4444',
                    'time_ago' => $ticket->created_at->diffForHumans()
                ]);
            });

            // 2. Applications
            Application::with(['user', 'internship'])->latest()->take(3)->get()->each(function ($app) use ($synthetic) {
                $name = $app->user->name ?? 'Intern';
                $title = $app->internship->title ?? 'Position';
                $synthetic->push((object)[
                    'title' => 'New Application',
                    'description' => "{$name} applied for {$title}",
                    'icon' => 'fa-file-alt',
                    'color' => '#10B981',
                    'time_ago' => $app->created_at->diffForHumans()
                ]);
            });

            // 3. Offers
            InternshipOffer::with(['company', 'user', 'internship'])->latest()->take(3)->get()->each(function ($offer) use ($synthetic) {
                $cName = $offer->company->company_name ?? 'Company';
                $sName = $offer->user->name ?? 'Intern';
                $title = $offer->internship->title ?? 'Position';
                $status = ucfirst($offer->status);
                $synthetic->push((object)[
                    'title' => "Offer {$status}",
                    'description' => "{$cName} sent offer to {$sName} for {$title}",
                    'icon' => 'fa-gift',
                    'color' => '#8B5CF6',
                    'time_ago' => $offer->created_at->diffForHumans()
                ]);
            });

            $activities = $synthetic->sortByDesc('time_ago')->take(10)->values();
        }

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

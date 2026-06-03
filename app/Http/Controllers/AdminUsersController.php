<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use App\Models\Department;

class AdminUsersController extends Controller
{
    public function index($companySlug = null)
    {
        $users = User::orderBy('id', 'desc')->get();
        $universities = University::all();
        $departments = Department::all();
        
        $totalUsers = $users->count();
        $activeUsers = User::where('status', 'active')->count(); // Or calculate based on activity
        $pendingVerifications = User::whereNull('email_verified_at')->count();

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.users', compact(
            'users',
            'universities',
            'departments',
            'totalUsers',
            'activeUsers',
            'pendingVerifications',
            'slug'
        ));
    }
}

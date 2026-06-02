<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUniversitiesController extends Controller
{
    public function index($companySlug = null)
    {
        $universities = \App\Models\University::withCount('students')
            ->withCount('departments')
            ->withCount(['applications as internships_count' => function ($query) {
                $query->whereIn('applications.status', ['accepted', 'hired', 'active']);
            }])
            ->orderBy('id', 'desc')->get();
        $totalUniversities = \App\Models\University::count();
        $totalStudents = \App\Models\User::whereNotNull('university_id')->where('role', 'intern')->count();
        $totalFaculties = \App\Models\Department::select('faculty')->distinct()->count('faculty');
        $totalCompanies = \App\Models\Company::count();

        // Calculate this month's stats
        $startOfMonth = now()->startOfMonth();
        $newUniversities = \App\Models\University::where('created_at', '>=', $startOfMonth)->count();
        $newStudents = \App\Models\User::whereNotNull('university_id')->where('role', 'intern')->where('created_at', '>=', $startOfMonth)->count();
        // Since faculty is a column, calculating "new faculties" is tricky. Let's count new departments instead for the faculty stat, or just count departments created this month.
        $newFaculties = \App\Models\Department::where('created_at', '>=', $startOfMonth)->count();
        $newCompanies = \App\Models\Company::where('created_at', '>=', $startOfMonth)->count();

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.universities', compact(
            'universities',
            'totalUniversities',
            'totalStudents',
            'totalFaculties',
            'totalCompanies',
            'newUniversities',
            'newStudents',
            'newFaculties',
            'newCompanies',
            'slug'
        ));
    }

    public function store(\Illuminate\Http\Request $request, $company = null)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'required|string',
            'faculties_count' => 'nullable|integer',
            'departments_count' => 'nullable|integer',
        ]);

        $colors = [
            'linear-gradient(135deg,rgba(37,99,235,0.15) 0%,rgba(37,99,235,0.05) 100%)' => '#3B82F6',
            'linear-gradient(135deg,rgba(16,185,129,0.15) 0%,rgba(16,185,129,0.05) 100%)' => '#10B981',
            'linear-gradient(135deg,rgba(99,102,241,0.15) 0%,rgba(99,102,241,0.05) 100%)' => '#6366F1',
        ];
        $colorKeys = array_keys($colors);
        $grad = $colorKeys[array_rand($colorKeys)];

        $validated['color'] = $grad;
        $validated['icon'] = $colors[$grad];
        $validated['students_count'] = 0;
        $validated['internships_count'] = 0;
        if (!isset($validated['faculties_count'])) $validated['faculties_count'] = 0;
        if (!isset($validated['departments_count'])) $validated['departments_count'] = 0;

        $university = \App\Models\University::create($validated);

        return response()->json(['success' => true, 'university' => $university]);
    }

    public function update(\Illuminate\Http\Request $request, $company, $id = null)
    {
        // If $id is null, it means the route didn't pass company and $company is actually the $id
        $universityId = $id ?? $company;
        $university = \App\Models\University::findOrFail($universityId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'required|string',
            'faculties_count' => 'nullable|integer',
        ]);

        $university->update($validated);

        return response()->json(['success' => true, 'university' => $university]);
    }

    public function destroy($company, $id = null)
    {
        $universityId = $id ?? $company;
        $university = \App\Models\University::findOrFail($universityId);
        $university->delete();

        return response()->json(['success' => true]);
    }}

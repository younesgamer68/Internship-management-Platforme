<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Company;

class AdminInternshipsController extends Controller
{
    public function index($companySlug = null)
    {
        $internships = Internship::with('company')->orderBy('id', 'desc')->get();
        $companies = Company::orderBy('name')->get();
        
        $totalInternships = Internship::count();
        $activeInternships = Internship::where('status', 'Active')->orWhere('status', 'Open')->count();
        $pendingInternships = Internship::where('status', 'Pending')->count();
        $completedInternships = Internship::where('status', 'Completed')->count();

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.internships', compact(
            'internships',
            'companies',
            'totalInternships',
            'activeInternships',
            'pendingInternships',
            'completedInternships',
            'slug'
        ));
    }

    public function store(Request $request, $companySlug = null)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'field' => 'nullable|string|max:255',
            'internship_type' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'description' => 'required|string',
            'skills_required' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']) . '-' . uniqid();
        }

        if (isset($validated['skills_required']) && is_string($validated['skills_required'])) {
            $validated['skills_required'] = explode(',', $validated['skills_required']);
            $validated['skills_required'] = array_map('trim', $validated['skills_required']);
        }

        $internship = Internship::create($validated);
        $internship->load('company');

        return response()->json(['success' => true, 'internship' => $internship]);
    }

    public function update(Request $request, $companySlug, $id = null)
    {
        $internshipId = $id ?? $companySlug;
        $internship = Internship::findOrFail($internshipId);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'field' => 'nullable|string|max:255',
            'internship_type' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'description' => 'required|string',
            'skills_required' => 'nullable|string',
        ]);

        if (isset($validated['skills_required']) && is_string($validated['skills_required'])) {
            $validated['skills_required'] = explode(',', $validated['skills_required']);
            $validated['skills_required'] = array_map('trim', $validated['skills_required']);
        }

        $internship->update($validated);
        $internship->load('company');

        return response()->json(['success' => true, 'internship' => $internship]);
    }

    public function destroy($companySlug, $id = null)
    {
        $internshipId = $id ?? $companySlug;
        $internship = Internship::findOrFail($internshipId);
        $internship->delete();

        return response()->json(['success' => true]);
    }
}

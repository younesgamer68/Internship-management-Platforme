<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Internship;
use App\Models\User;
use App\Notifications\NewApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request, $company, Internship $internship)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'existing_document_id' => 'nullable|exists:documents,id',
        ]);

        $resumePath = null;
        if ($request->filled('existing_document_id')) {
            $document = \App\Models\Document::where('user_id', Auth::id())->find($request->existing_document_id);
            if ($document) {
                $resumePath = $document->file_path;
            }
        } elseif ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Check if user already applied
        $existing = Application::where('user_id', Auth::id())
            ->where('internship_id', $internship->id)
            ->first();

        if ($existing) {
            return back()->with('error', 'You have already applied for this internship.');
        }

        $application = Application::create([
            'user_id' => Auth::id(),
            'internship_id' => $internship->id,
            'cover_letter' => $request->cover_letter,
            'resume_url' => $resumePath,
            'status' => 'pending',
            'applied_at' => now(),
        ]);

        // Notify company users
        $companyUsers = User::where('company_id', $internship->company_id)
            ->whereIn('role', ['company', 'company_manager', 'admin'])
            ->get();
            
        foreach ($companyUsers as $user) {
            $user->notify(new NewApplicationNotification($application));
        }

        return back()->with('success', 'Application submitted for ' . $internship->title);
    }

    public function destroy(Request $request, $company, Application $application)
    {
        if ($application->user_id !== Auth::id()) {
            abort(403);
        }

        $application->delete();

        return response()->json(['success' => true]);
    }
}

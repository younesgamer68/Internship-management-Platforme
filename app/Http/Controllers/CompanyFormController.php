<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyFormController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $company = $user->company;

        return view('signe-up.company.company_form', compact('user', 'company'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'company_name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'founded_year' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'default_duration' => 'nullable|string|max:255',
            'default_location' => 'nullable|string|max:255',
            'max_applicants' => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($request, $user) {
            if ($user->company_id && $user->company) {
                // Update existing company
                $company = $user->company;
                $company->update([
                    'company_name' => $request->company_name,
                    'website' => $request->website,
                    'industry' => $request->industry,
                    'company_size' => $request->company_size,
                    'founded_year' => $request->founded_year,
                    'headquarters' => $request->headquarters,
                    'description' => $request->description,
                    'default_duration' => $request->default_duration,
                    'default_location' => $request->default_location,
                    'max_applicants' => $request->max_applicants,
                ]);
            } else {
                // Create new company
                $baseSlug = Str::slug($request->company_name);
                $slug = $baseSlug;
                $counter = 1;

                while (Company::query()->where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $company = Company::create([
                    'company_name' => $request->company_name,
                    'slug' => $slug,
                    'email' => $user->email,
                    'website' => $request->website,
                    'industry' => $request->industry,
                    'company_size' => $request->company_size,
                    'founded_year' => $request->founded_year,
                    'headquarters' => $request->headquarters,
                    'description' => $request->description,
                    'default_duration' => $request->default_duration,
                    'default_location' => $request->default_location,
                    'max_applicants' => $request->max_applicants,
                    'require_client_verification' => false,
                ]);

                $user->update([
                    'company_id' => $company->id,
                    'role' => 'company_manager',
                ]);
            }
        });

        return redirect()->route('home')->with('success', 'Company profile saved successfully!');
    }

    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;

        if (!$company) {
            return back()->with('error', 'Company not found.');
        }

        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'founded_year' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'default_duration' => 'nullable|string|max:255',
            'default_location' => 'nullable|string|max:255',
            'max_applicants' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'company_name', 'website', 'industry', 'company_size', 
            'founded_year', 'headquarters', 'description',
            'default_duration', 'default_location', 'max_applicants'
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('company_logos', 'public');
            $data['logo'] = $path;
        }

        $company->update(array_filter($data, function($val) { return $val !== null; }));

        return back()->with('success', 'Settings updated successfully!');
    }
}

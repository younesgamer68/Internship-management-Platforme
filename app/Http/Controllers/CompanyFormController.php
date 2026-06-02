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

        // If they already have a company, redirect them
        if ($user->company_id) {
            return redirect()->route('home');
        }

        return view('signe-up.company.company_form', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->company_id) {
            return redirect()->route('home');
        }

        $request->validate([
            'company_name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $user) {
            $baseSlug = Str::slug($request->company_name);
            $slug = $baseSlug;
            $counter = 1;

            while (Company::where('slug', $slug)->exists()) {
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
                'country' => $request->country,
                'city' => $request->city,
                'description' => $request->description,
                'require_client_verification' => false,
            ]);

            $user->update([
                'company_id' => $company->id,
            ]);
        });

        return redirect()->route('home')->with('success', 'Company profile created successfully!');
    }
}

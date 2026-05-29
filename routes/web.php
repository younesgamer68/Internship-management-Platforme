<?php

use App\Http\Controllers\CareerFieldController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\QuickRegisterController;
use App\Models\Application;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// ====== HOME ======
Route::get('/', function (Request $request) {
    $host = explode(':', $request->getHost())[0];
    $baseDomain = config('app.domain');

    if ($baseDomain && str_ends_with($host, '.'.$baseDomain)) {
        $protocol = app()->environment('local') ? 'http' : 'https';

        return redirect()->away($protocol.'://'.$baseDomain.'/');
    }

    return view('welcome');
})->name('welcome');

Route::view('/contact', 'contact')->name('contact');
Route::redirect('/help-center', '/')->name('help-center');
Route::redirect('/about', '/about-us/our-mission')->name('about');
Route::get('/home', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            return $user->career_field
                ? redirect()->route('intern.opportunities')
                : redirect()->route('career_fields');
        }
    }
    return redirect()->route('choose_intership');
})->middleware('auth')->name('app.home');

Route::get('/choose-path', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            return $user->career_field
                ? redirect()->route('intern.opportunities')
                : redirect()->route('career_fields');
        }
        return redirect('/home');
    }
    return view('signe-up.choose_path');
})->name('choose_path');

Route::get('/career-fields', [CareerFieldController::class, 'index'])
    ->middleware('auth')
    ->name('career_fields');
Route::post('/career-fields', [CareerFieldController::class, 'store'])
    ->middleware('auth')
    ->name('career_fields.store');

Route::get('/choose-intership', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            return $user->career_field
                ? redirect()->route('intern.opportunities')
                : redirect()->route('career_fields');
        }
    }
    return view('signe-up.intern.choose_intership');
})->name('choose_intership');

Route::get('/intern/opportunities', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern' && !$user->career_field) {
            return redirect()->route('career_fields');
        }
        
        $internships = \App\Models\Internship::with('company')
            ->where('field', $user->career_field)
            ->where('status', 'Open')
            ->latest()
            ->get();

        $relatedFields = match ($user->career_field) {
            'Business' => ['Marketing', 'Finance', 'Entrepreneurship & Startups'],
            'Computer Science & IT' => ['Full Stack Development', 'Data Analytics', 'Product Management'],
            'Creative, Design & Fashion' => ['UI/UX Design', 'Marketing', 'Media, Communications & Publishing'],
            'Engineering' => ['Product Management', 'Urban Planning & Architecture', 'Logistics & Supply Chain'],
            'Entrepreneurship & Startups' => ['Business', 'Marketing', 'Product Management'],
            'Finance' => ['Business', 'Data Analytics', 'Accounting'],
            'Green Tech & Sustainability' => ['Engineering', 'Product Management', 'Business'],
            'Health, Wellness & Sports Management' => ['Healthcare & Pharmaceutical', 'Business', 'Marketing'],
            'Healthcare & Pharmaceutical' => ['Health, Wellness & Sports Management', 'Data Analytics', 'Business'],
            'Hospitality, Tourism & Events' => ['Marketing', 'Business', 'Media, Communications & Publishing'],
            'International Dev, NGOs & Charity' => ['Business', 'Marketing', 'Human Resources'],
            'Legal' => ['Business', 'Recruitment & HR', 'Finance'],
            'Logistics & Supply Chain' => ['Business', 'Engineering', 'Product Management'],
            'Marketing' => ['Business', 'Media, Communications & Publishing', 'Recruitment & HR'],
            'Media, Communications & Publishing' => ['Marketing', 'Creative, Design & Fashion', 'Business'],
            'Real Estate' => ['Business', 'Marketing', 'Engineering'],
            'Recruitment & HR' => ['Business', 'Marketing', 'Legal'],
            'Urban Planning & Architecture' => ['Engineering', 'Product Management', 'Real Estate'],
            'UI/UX Design' => ['Product Management', 'Computer Science & IT', 'Creative, Design & Fashion'],
            'Product Management' => ['Business', 'Computer Science & IT', 'UI/UX Design'],
            'Data Analytics' => ['Business', 'Finance', 'Computer Science & IT'],
            'Full Stack Development' => ['Computer Science & IT', 'Data Analytics', 'Product Management'],
            default => [],
        };

        $fieldPool = array_values(array_unique(array_filter(array_merge([$user->career_field], $relatedFields))));

        $recentActivities = Application::with(['user', 'internship.company'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'intern');
            })
            ->whereHas('internship', function ($query) use ($fieldPool) {
                $query->whereIn('field', $fieldPool);
            })
            ->latest('applied_at')
            ->take(20)
            ->get()
            ->values()
            ->map(function (Application $application, int $index) {
                $userName = $application->user->name ?? 'Student';
                $internshipTitle = $application->internship?->title ?? 'an opportunity';
                $companyName = $application->internship?->company?->name;
                $location = trim(implode(', ', array_filter([
                    $application->internship?->city ?? null,
                    $application->internship?->country ?? null,
                ])));

                $action = match ($application->status) {
                    'accepted', 'approved' => 'enrolled in',
                    'rejected', 'declined' => 'was reviewed for',
                    default => 'applied to',
                };

                $text = $userName.' '.$action.' '.$internshipTitle;
                if ($companyName) {
                    $text .= ' at '.$companyName;
                }
                if ($location !== '') {
                    $text .= ' in '.$location;
                }

                $parts = preg_split('/\s+/', trim($userName)) ?: [];
                $initials = collect($parts)
                    ->filter()
                    ->take(2)
                    ->map(fn (string $part) => Str::upper(Str::substr($part, 0, 1)))
                    ->implode('');

                $palette = ['bg-teal-500', 'bg-orange-400', 'bg-blue-500', 'bg-emerald-500', 'bg-indigo-500'];

                return [
                    'color' => $palette[$index % count($palette)],
                    'initials' => $initials ?: 'A',
                    'text' => $text,
                    'time' => $application->applied_at?->diffForHumans() ?? $application->created_at?->diffForHumans(),
                ];
            });

        if ($recentActivities->isEmpty()) {
            $recentActivities = Application::with(['user', 'internship.company'])
                ->whereHas('user', function ($query) {
                    $query->where('role', 'intern');
                })
                ->latest('applied_at')
                ->take(20)
                ->get()
                ->values()
                ->map(function (Application $application, int $index) {
                    $userName = $application->user->name ?? 'Student';
                    $internshipTitle = $application->internship?->title ?? 'an opportunity';
                    $companyName = $application->internship?->company?->name;
                    $location = trim(implode(', ', array_filter([
                        $application->internship?->city ?? null,
                        $application->internship?->country ?? null,
                    ])));

                    $action = match ($application->status) {
                        'accepted', 'approved' => 'enrolled in',
                        'rejected', 'declined' => 'was reviewed for',
                        default => 'applied to',
                    };

                    $text = $userName.' '.$action.' '.$internshipTitle;
                    if ($companyName) {
                        $text .= ' at '.$companyName;
                    }
                    if ($location !== '') {
                        $text .= ' in '.$location;
                    }

                    $parts = preg_split('/\s+/', trim($userName)) ?: [];
                    $initials = collect($parts)
                        ->filter()
                        ->take(2)
                        ->map(fn (string $part) => Str::upper(Str::substr($part, 0, 1)))
                        ->implode('');

                    $palette = ['bg-teal-500', 'bg-orange-400', 'bg-blue-500', 'bg-emerald-500', 'bg-indigo-500'];

                    return [
                        'color' => $palette[$index % count($palette)],
                        'initials' => $initials ?: 'A',
                        'text' => $text,
                        'time' => $application->applied_at?->diffForHumans() ?? $application->created_at?->diffForHumans(),
                    ];
                });
        }
            
        return view('signe-up.intern.opportunities', compact('internships', 'recentActivities'));
    }
    return redirect()->route('login');
})->middleware('auth')->name('intern.opportunities');

Route::get('/intern/application', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern' && !$user->career_field) {
            return redirect()->route('career_fields');
        }
        return view('signe-up.intern.interform');
    }
    return redirect()->route('login');
})->middleware('auth')->name('intern.application');

Route::post('/intern/application', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'date_of_birth' => 'required|date',
        'gender' => 'nullable|string',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'university' => 'required|string|max:255',
        'degree' => 'required|string',
        'field_of_study' => 'required|string|max:255',
        'education_start_year' => 'required|integer|min:2000|max:2035',
        'education_end_year' => 'nullable|integer|min:2000|max:2040',
        'gpa' => 'nullable|string|max:20',
        'experience' => 'nullable|string',
        'skills' => 'required|string',
        'linkedin_url' => 'nullable|url|max:500',
        'portfolio_url' => 'nullable|url|max:500',
        'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        'motivation' => 'required|string',
        'preferred_start_date' => 'required|date',
        'availability' => 'required|string',
        'referral_source' => 'nullable|string',
        'agree_terms' => 'accepted',
    ]);

    $user = auth()->user();

    // Store resume file if provided, otherwise preserve existing
    $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
    $resumePath = $detail ? $detail->resume_path : null;
    if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store('resumes', 'public');
    }

    // Create or update intern info details
    \App\Models\InternInfoDetail::updateOrCreate(
        ['user_id' => $user->id],
        [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'country' => $request->country,
            'city' => $request->city,
            'university' => $request->university,
            'degree' => $request->degree,
            'field_of_study' => $request->field_of_study,
            'education_start_year' => $request->education_start_year,
            'education_end_year' => $request->education_end_year,
            'gpa' => $request->gpa,
            'experience' => $request->experience,
            'skills' => $request->skills,
            'linkedin_url' => $request->linkedin_url,
            'portfolio_url' => $request->portfolio_url,
            'resume_path' => $resumePath,
            'motivation' => $request->motivation,
            'preferred_start_date' => $request->preferred_start_date,
            'availability' => $request->availability,
            'referral_source' => $request->referral_source,
            'status' => 'pending',
        ]
    );

    // Also update the user's name, phone, and role
    $user->update([
        'name' => $request->first_name . ' ' . $request->last_name,
        'phone_number' => $request->phone,
        'role' => 'intern',
    ]);

    return redirect()->route('intern.dashboard')
        ->with('status', 'application-submitted');
})->middleware('auth')->name('intern.application.store');

Route::get('/intern/dashboard', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if (!$detail) {
                // Not registered yet - send to registration flow
                return $user->career_field
                    ? redirect()->route('intern.opportunities')
                    : redirect()->route('career_fields');
            }
            return view('signe-up.intern.InterDashboard', compact('user', 'detail'));
        }
    }
    return redirect()->route('login');
})->middleware('auth')->name('intern.dashboard');

Route::get('/get-started', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            return $user->career_field
                ? redirect()->route('intern.opportunities')
                : redirect()->route('career_fields');
        }
    }
    return view('signe-up.intern.get-started');
})->name('get_started');

Route::view('/find-batch', 'signe-up.intern.find-batch')->name('find_batch');
Route::view('/get-started-company', 'signe-up.company.get-started-company')->name('get_started_company');
Route::view('/admin-login', 'signe-up.admin.admin-login')->name('admin.login');
Route::post('/admin-login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    // Demo bootstrap: allow these exact credentials and ensure an admin account exists.
    if ($credentials['email'] === 'admin@internlink.test' && $credentials['password'] === 'AdminPass123!') {
        $admin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@internlink.test'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('AdminPass123!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        if ($admin->role !== 'admin') {
            $admin->role = 'admin';
            $admin->save();
        }

        Auth::login($admin);
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()?->role === 'admin') {
            return redirect()->route('home');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    return back()->withErrors([
        'email' => 'These credentials do not match an admin account.',
    ])->onlyInput('email');
})->middleware('guest')->name('admin.login.attempt');

// ====== NAVBAR LINKS ======
// Home
Route::view('/features', 'navbarlinks.home.features')->name('navbarlink.home.features');
Route::view('/statistics', 'navbarlinks.home.statistics')->name('navbarlink.home.statistics');
Route::view('/opportunities', 'navbarlinks.home.latest_opportunities')->name('navbarlink.home.opportunities');
Route::view('/testimonials', 'navbarlinks.home.testimonials')->name('navbarlink.home.testimonials');

// Internships
Route::view('/internships/browse', 'navbarlinks.internships.browse_internships')->name('navbarlink.internships.browse');
Route::view('/internships/remote', 'navbarlinks.internships.remote_internships')->name('navbarlink.internships.remote');
Route::view('/internships/on-site', 'navbarlinks.internships.on_site_internships')->name('navbarlink.internships.on-site');
Route::view('/internships/hybrid', 'navbarlinks.internships.hybrid_internships')->name('navbarlink.internships.hybrid');
Route::view('/internships/paid', 'navbarlinks.internships.paid_internships')->name('navbarlink.internships.paid');
Route::view('/internships/saved', 'navbarlinks.internships.saved_internships')->name('navbarlink.internships.saved');
Route::view('/internships/categories', 'navbarlinks.internships.internship_categories')->name('navbarlink.internships.categories');
Route::view('/internships/tracker', 'navbarlinks.internships.application_tracker')->name('navbarlink.internships.tracker');

// Companies
Route::view('/companies/partners', 'navbarlinks.companies.partner_companies')->name('navbarlink.companies.partners');
Route::view('/companies/top-recruiters', 'navbarlinks.companies.top_recruiters')->name('navbarlink.companies.top-recruiters');
Route::view('/companies/reviews', 'navbarlinks.companies.company_reviews')->name('navbarlink.companies.reviews');
Route::view('/companies/become-a-partner', 'navbarlinks.companies.become_a_partner')->name('navbarlink.companies.become-a-partner');
Route::view('/companies/post-internship', 'navbarlinks.companies.post_an_internship')->name('navbarlink.companies.post-internship');

// How It Works
Route::view('/how-it-works/students', 'navbarlinks.how_it_works.for_students')->name('navbarlink.howit.students');
Route::view('/how-it-works/companies', 'navbarlinks.how_it_works.for_companies')->name('navbarlink.howit.companies');
Route::view('/how-it-works/universities', 'navbarlinks.how_it_works.for_universities')->name('navbarlink.howit.universities');
Route::view('/how-it-works/recruitment-process', 'navbarlinks.how_it_works.recruitment_process')->name('navbarlink.howit.recruitment');

// Resources
Route::view('/resources/cv-builder', 'navbarlinks.resources.cv_builder')->name('navbarlink.resources.cv-builder');
Route::view('/resources/resume-tips', 'navbarlinks.resources.resume_tips')->name('navbarlink.resources.resume-tips');
Route::view('/resources/interview-preparation', 'navbarlinks.resources.interview_preparation')->name('navbarlink.resources.interview-preparation');
Route::view('/resources/career-roadmaps', 'navbarlinks.resources.career_roadmaps')->name('navbarlink.resources.career-roadmaps');
Route::view('/resources/blog', 'navbarlinks.resources.blog')->name('navbarlink.resources.blog');
Route::view('/resources/guides-tutorials', 'navbarlinks.resources.guides_tutorials')->name('navbarlink.resources.guides-tutorials');

// ====== AUTH ======
Route::middleware('guest')->group(function () {
    Route::get('/login', function (Request $request) {
        $host = explode(':', $request->getHost())[0];
        $baseDomain = config('app.domain');

        if ($baseDomain && str_ends_with($host, '.'.$baseDomain)) {
            $protocol = app()->environment('local') ? 'http' : 'https';

            return redirect()->away($protocol.'://'.$baseDomain.'/login');
        }

        return view('auth.login');
    })->name('login');
    Route::livewire('/set-password', App\Livewire\Auth\SetPassword::class)
        ->name('set-password')
        ->middleware('user.pending');

    // Invitation link acceptance
    Route::get('/invitation/{user}', App\Http\Controllers\Auth\InvitationController::class)
        ->name('invitations.accept');

    Route::post('/register/quick', [QuickRegisterController::class, 'store'])
        ->name('register.quick');

    Route::livewire('/verify-email-code-guest', App\Livewire\Auth\QuickVerifyGuest::class)
        ->name('verification.guest.notice');

    // Google OAuth
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
        ->name('google.login');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
});

Route::post('/logout', function () {
    Auth::logout();

    $protocol = app()->environment('local') ? 'http' : 'https';

    return redirect()->away($protocol.'://'.config('app.domain').'/');
})->middleware('auth')->name('logout');

// ====== EMAIL VERIFICATION WITH CODE ======
Route::livewire('/email/verify', App\Livewire\Auth\VerifyEmailCode::class)
    ->middleware('auth')
    ->name('verification.notice');

// Keep link-based verification as backup
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('career_fields');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Protected Dashboard Route
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            return redirect()->route('app.home');
        }
    }
    return view('dashboard');
})->middleware('auth')->name('home');

require __DIR__.'/settings.php';

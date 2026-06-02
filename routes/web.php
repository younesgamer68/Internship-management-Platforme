<?php

use App\Http\Controllers\CareerFieldController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\QuickRegisterController;
use App\Http\Controllers\CompanyQuickRegisterController;
use App\Http\Controllers\CompanyFormController;
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
Route::view('/about', 'aboutus')->name('about');
Route::get('/home', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
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
            $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
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

Route::view('/role-conflict', 'auth.role-conflict')->name('role.conflict');

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
            $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
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
    $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
    $resumePath = $detail ? $detail->resume_path : null;
    if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store('resumes', 'public');
    }

    // Create or update intern info details
    \App\Models\UserInfo::updateOrCreate(
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
            $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
            if (!$detail) {
                // Not registered yet - send to registration flow
                return $user->career_field
                    ? redirect()->route('intern.opportunities')
                    : redirect()->route('career_fields');
            }
            $companySlug = $user->company ? $user->company->slug : 'internlink-demo';
            return redirect()->route('student.dashboard', ['company' => $companySlug]);
        }
    }
    return redirect()->route('login');
})->middleware('auth')->name('intern.dashboard');

Route::get('/get-started', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'intern') {
            $detail = \App\Models\UserInfo::where('user_id', $user->id)->first();
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

// Locale switcher — set preferred language in session and redirect back
Route::get('/locale/{lang}', function (Request $request, $lang) {
    $allowed = ['en', 'fr'];
    if (in_array($lang, $allowed)) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return redirect()->back();
})->name('locale.switch');

Route::view('/find-batch', 'signe-up.intern.find-batch')->name('find_batch');
Route::view('/get-started-company', 'signe-up.company.get-started-company')->name('get_started_company');
Route::view('/admin-login', 'signe-up.admin.admin-login')->name('admin.login');
Route::post('/admin-login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (!\Illuminate\Support\Facades\Schema::hasTable('admin')) {
        \Illuminate\Support\Facades\Schema::create('admin', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('admin')->insert([
            'email' => 'youness.ben-touttibt.00@edu.uiz.ac.ma',
            'password' => 'admin123',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $adminRow = \Illuminate\Support\Facades\DB::table('admin')->where('email', $credentials['email'])->first();
    if ($adminRow) {
        $stored = $adminRow->password ?? '';
        $matches = false;
        // Only call Hash::check if the stored value looks like a bcrypt/argon hash.
        if (is_string($stored) && preg_match('/^\$2[aby]\$|^\$argon2/', $stored)) {
            $matches = \Illuminate\Support\Facades\Hash::check($credentials['password'], $stored);
        } else {
            $matches = ($credentials['password'] === $stored);
        }
        if ($matches) {
            $admin = \App\Models\User::firstOrCreate(
                ['email' => $credentials['email']],
                [
                    'name' => 'Admin',
                    'password' => \Illuminate\Support\Facades\Hash::make($credentials['password']),
                    'role' => 'admin',
                    'email_verified_at' => now(),
                ]
            );

            $admin->role = 'admin';
            $admin->save();

            Auth::login($admin);
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'The password is incorrect for this admin email.',
        ])->onlyInput('email');
    }

    return back()->withErrors([
        'email' => 'Admin email not found.',
    ])->onlyInput('email');
})->middleware('guest')->name('admin.login.attempt');

Route::post('/admin-password/request-code', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $email = $request->input('email');

    if (!\Illuminate\Support\Facades\Schema::hasTable('admin')) {
        \Illuminate\Support\Facades\Schema::create('admin', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('admin')->insert([
            'email' => 'youness.ben-touttibt.00@edu.uiz.ac.ma',
            'password' => 'admin123',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    if (!\Illuminate\Support\Facades\DB::table('admin')->where('email', $email)->exists()) {
        // Create a default admin row for this email so the reset flow can proceed.
        \Illuminate\Support\Facades\DB::table('admin')->insert([
            'email' => $email,
            'password' => 'admin123',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $admin = \App\Models\User::firstOrCreate(
        ['email' => $email],
        [
            'name' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('AdminPass123!'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]
    );

    $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

    $request->session()->put('admin_password_reset', [
        'email' => $email,
        'code' => $code,
        'verified' => false,
        'expires_at' => now()->addMinutes(10),
    ]);

    \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\VerificationCode($code));

    // Also log the code server-side so it's visible when mail isn't configured.
    \Illuminate\Support\Facades\Log::info('Admin password reset code generated', ['email' => $email, 'code' => $code]);
    \Illuminate\Support\Facades\Log::info('Mail driver in use', ['driver' => config('mail.default')]);

    return response()->json(['message' => 'Verification code sent.']);
})->middleware('guest')->name('admin.password.request_code');

Route::post('/admin-password/verify-code', function (Request $request) {
    $request->validate([
        'code' => ['required', 'string'],
    ]);

    $payload = $request->session()->get('admin_password_reset', []);

    if (empty($payload) || now()->greaterThan($payload['expires_at'] ?? now())) {
        return response()->json(['message' => 'Verification code expired or invalid.'], 422);
    }

    if (!hash_equals($payload['code'], $request->input('code'))) {
        return response()->json(['message' => 'Verification code is incorrect.'], 422);
    }

    $request->session()->put('admin_password_reset.verified', true);

    return response()->json(['message' => 'Code verified.']);
})->middleware('guest')->name('admin.password.verify_code');


Route::post('/admin-password/update', function (Request $request) {
    // Relaxed validation per request: keep required and confirmed but remove minimum length requirements.
    $request->validate([
        'password' => ['required', 'string', 'confirmed'],
    ]);

    $payload = $request->session()->get('admin_password_reset', []);

    if (empty($payload) || empty($payload['verified'])) {
        return response()->json(['message' => 'Unauthorized password reset attempt.'], 403);
    }

    $admin = \App\Models\User::firstOrCreate(
        ['email' => $payload['email']],
        [
            'name' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make($request->input('password')),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]
    );

    $admin->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
    $admin->role = 'admin';
    $admin->email_verified_at = now();
    $admin->save();

    // Also update or insert the password in the `admin` table so it stays in sync.
    \Illuminate\Support\Facades\DB::table('admin')->updateOrInsert(
        ['email' => $payload['email']],
        ['password' => $request->input('password'), 'updated_at' => now()]
    );

    Auth::login($admin);
    $request->session()->regenerate();
    $request->session()->forget('admin_password_reset');

    return response()->json(['redirect' => route('home')]);
})->middleware('guest')->name('admin.password.update');

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
Route::view('/how-it-works/faq', 'navbarlinks.how_it_works.faq')->name('navbarlink.howit.faq');

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

    Route::post('/register/company/quick', [CompanyQuickRegisterController::class, 'store'])
        ->name('register.company.quick');



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

Route::get('/company/setup', [CompanyFormController::class, 'show'])->name('company.setup')->middleware('auth');
Route::post('/company/setup', [CompanyFormController::class, 'store'])->name('company.setup.store')->middleware('auth');

// Protected Dashboard Route
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $user = auth()->user();
        $companySlug = $user->company ? $user->company->slug : 'internlink-demo';
        
        if ($user->role === 'intern') {
            return redirect()->route('student.dashboard', ['company' => $companySlug]);
        }
        if ($user->role === 'company_manager') {
            if (!$user->company_id) {
                return redirect()->route('company.setup');
            }
            return redirect()->route('agent.dashboard', ['company' => $companySlug]);
        }
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard', ['company' => $companySlug]);
        }
    }
    return redirect()->route('login');
})->middleware('auth')->name('home');

Route::middleware(['auth'])->prefix('{company}')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $companySlug = $user->company ? $user->company->slug : 'internlink-demo';
        return redirect()->route('agent.dashboard', ['company' => $companySlug]);
    })->name('dashboard');

    Route::view('/home', 'app.dashboard')->name('agent.dashboard');
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Company Portal Sub-pages
    Route::get('/internships/offers', function () {
        return view('app.company.offers');
    })->name('company.offers');

    Route::get('/internships/applicants', function () {
        return view('app.company.applicants');
    })->name('company.applicants');

    Route::get('/internships/interviews', function () {
        return view('app.company.interviews');
    })->name('company.interviews');

    Route::get('/company/analytics', function () {
        return view('app.company.analytics');
    })->name('company.analytics');

    Route::get('/company/settings', function () {
        return view('app.company.settings');
    })->name('company.settings');

    Route::get('/company/support', function () {
        return view('app.company.support');
    })->name('company.support');

    // Student Portal Sub-pages
    Route::get('/student/dashboard', function () {
        return view('app.student.dashboard');
    })->name('student.dashboard');

    Route::get('/student/listings', function () {
        return view('app.student.listings');
    })->name('student.listings');

    Route::get('/student/applications', function () {
        return view('app.student.applications');
    })->name('student.applications');

    Route::get('/student/documents', function () {
        return view('app.student.documents');
    })->name('student.documents');

    Route::get('/student/profile', function () {
        return view('app.student.profile');
    })->name('student.profile');

    Route::get('/student/support', function () {
        return view('app.student.support');
    })->name('student.support');

    // Admin Portal Sub-pages
    Route::get('/admin/users', function () {
        return view('app.admin.users');
    })->name('admin.users');

    Route::get('/admin/universities', [\App\Http\Controllers\AdminUniversitiesController::class, 'index'])->name('admin.universities');
    Route::post('/admin/universities', [\App\Http\Controllers\AdminUniversitiesController::class, 'store'])->name('admin.universities.store');
    Route::put('/admin/universities/{id}', [\App\Http\Controllers\AdminUniversitiesController::class, 'update'])->name('admin.universities.update');
    Route::delete('/admin/universities/{id}', [\App\Http\Controllers\AdminUniversitiesController::class, 'destroy'])->name('admin.universities.destroy');

    Route::get('/admin/departments', function () {
        return view('app.admin.departments');
    })->name('admin.departments');

    Route::get('/admin/internships', function () {
        return view('app.admin.internships');
    })->name('admin.internships');

    Route::get('/admin/reports', function () {
        return view('app.admin.reports');
    })->name('admin.reports');

    Route::get('/admin/settings', function () {
        return view('app.admin.settings');
    })->name('admin.settings');

    Route::get('/admin/support', function () {
        return view('app.admin.support');
    })->name('admin.support');
});

require __DIR__.'/settings.php';

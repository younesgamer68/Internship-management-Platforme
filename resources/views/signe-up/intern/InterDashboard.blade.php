<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Dashboard - Application Details</title>
    <meta name="description" content="View your submitted internship application status, personal information, educational background, and experience.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top right, rgba(13, 148, 136, 0.05), transparent 40%),
                        radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.05), transparent 40%),
                        #f9fafb;
        }
        .info-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        /* Modal Styles */
        .modal-backdrop {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-panel {
            transform: scale(0.95) translateY(10px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal-backdrop.active .modal-panel {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    </style>
</head>

<body class="min-h-screen text-gray-900 antialiased py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl mx-auto">
        {{-- Header Section --}}
        <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-8 pb-6 border-b border-gray-200">
            <div>
                <h1 id="dashboard-title" class="text-3xl font-extrabold text-gray-900 tracking-tight">Intern Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Review your submitted internship application details below.</p>
            </div>
            <div class="flex items-center gap-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button id="home-btn" onclick="event.preventDefault(); openHomeModal();"
                    class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 rounded-xl shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-lg hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </button>
                <button id="logout-btn" onclick="event.preventDefault(); openLogoutModal();"
                    class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 active:bg-red-800 rounded-xl shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 hover:shadow-lg hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Log Out
                </button>
            </div>
        </header>

        {{-- Status Alert Banner --}}
        @if(!$detail)
        <div class="bg-orange-50 border border-orange-200 rounded-2xl p-4 mb-6 flex items-start gap-3.5 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-orange-500/10 flex items-center justify-center flex-shrink-0 text-orange-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-sm font-bold text-orange-900">Incomplete Profile</h3>
                <p class="text-xs text-orange-700/80 mt-1 mb-3">You haven't completed your internship application yet. Please finish setting up your profile to start applying!</p>
                <a href="{{ $user->career_field ? route('intern.opportunities') : route('career_fields') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-bold text-white bg-orange-600 hover:bg-orange-700 rounded-lg transition-colors shadow-sm">
                    Complete Application
                </a>
            </div>
        </div>
        @else
        <div class="bg-teal-50 border border-teal-200 rounded-2xl p-4 mb-6 flex items-start gap-3.5 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-teal-500/10 flex items-center justify-center flex-shrink-0 text-teal-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-teal-900">Application Status: <span class="uppercase tracking-wider px-2 py-0.5 text-xs font-semibold rounded-md bg-teal-100 text-teal-800 ml-1">{{ $detail->status ?? 'Pending' }}</span></h3>
                <p class="text-xs text-teal-700/80 mt-1">Thank you for submitting! Our team is currently reviewing your profile. We will get in touch with you shortly.</p>
            </div>
        </div>
        @endif

        {{-- Career Field Banner --}}
        <div class="mb-8 p-8 rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-700 shadow-xl text-center relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
            <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
            
            <p class="text-blue-100 text-sm font-semibold uppercase tracking-widest mb-2 relative z-10">Chosen Career Field</p>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight relative z-10">{{ $user->career_field ?? 'Not Selected' }}</h2>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- 1. Personal Information --}}
            <section class="info-card bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Personal Information</h2>
                        <p class="text-xs text-gray-400">Basic contact and identity info</p>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <div class="grid grid-cols-3 gap-2">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Full Name</span>
                        <p id="info-name" class="col-span-2 font-medium text-gray-800">{{ $detail->first_name ?? '' }} {{ $detail->last_name ?? '' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Email</span>
                        <p id="info-email" class="col-span-2 font-medium text-gray-800">{{ $user->email ?? 'N/A' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Phone</span>
                        <p id="info-phone" class="col-span-2 font-medium text-gray-800">{{ $detail->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Date of Birth</span>
                        <p id="info-dob" class="col-span-2 font-medium text-gray-800">
                            {{ isset($detail->date_of_birth) ? $detail->date_of_birth->format('F d, Y') : 'N/A' }}
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Gender</span>
                        <p id="info-gender" class="col-span-2 font-medium text-gray-800 capitalize">{{ $detail->gender ?? 'N/A' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Location</span>
                        <p id="info-location" class="col-span-2 font-medium text-gray-800">
                            {{ $detail->city ?? '' }}{{ isset($detail->city, $detail->country) ? ', ' : '' }}{{ $detail->country ?? '' }}
                        </p>
                    </div>
                </div>
            </section>

            {{-- 2. Education --}}
            <section class="info-card bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Academic Background</h2>
                        <p class="text-xs text-gray-400">School and degree details</p>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <div class="grid grid-cols-3 gap-2">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">University</span>
                        <p id="info-university" class="col-span-2 font-medium text-gray-800">{{ $detail->university ?? 'N/A' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Degree</span>
                        <p id="info-degree" class="col-span-2 font-medium text-gray-800 capitalize">{{ str_replace('_', ' ', $detail->degree ?? 'N/A') }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Field</span>
                        <p id="info-field" class="col-span-2 font-medium text-gray-800">{{ $detail->field_of_study ?? 'N/A' }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Duration</span>
                        <p id="info-duration" class="col-span-2 font-medium text-gray-800">
                            {{ $detail->education_start_year ?? 'N/A' }} – {{ $detail->education_end_year ?? 'Present' }}
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">GPA</span>
                        <p id="info-gpa" class="col-span-2 font-medium text-gray-800">{{ $detail->gpa ?? 'N/A' }}</p>
                    </div>
                </div>
            </section>

            {{-- 3. Experience & Skills --}}
            <section class="info-card bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Experience & Skills</h2>
                        <p class="text-xs text-gray-400">Professional profile & highlights</p>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Key Skills</span>
                        <div id="info-skills" class="flex flex-wrap gap-1.5 mt-1">
                            @if(isset($detail->skills))
                                @foreach(explode(',', $detail->skills) as $skill)
                                    <span class="px-2.5 py-1 text-xs font-medium bg-purple-50 text-purple-700 rounded-lg border border-purple-100">{{ trim($skill) }}</span>
                                @endforeach
                            @else
                                <span class="text-gray-400 italic">None provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Previous Experience</span>
                        <p id="info-experience" class="font-medium text-gray-800 leading-relaxed mt-1">
                            {{ $detail->experience ?? 'No previous experience provided.' }}
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">LinkedIn</span>
                        <p id="info-linkedin" class="col-span-2 font-medium text-teal-600 truncate">
                            @if($detail->linkedin_url ?? null)
                                <a href="{{ $detail->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline">{{ $detail->linkedin_url }}</a>
                            @else
                                <span class="text-gray-400 italic font-normal">N/A</span>
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Portfolio</span>
                        <p id="info-portfolio" class="col-span-2 font-medium text-teal-600 truncate">
                            @if($detail->portfolio_url ?? null)
                                <a href="{{ $detail->portfolio_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline">{{ $detail->portfolio_url }}</a>
                            @else
                                <span class="text-gray-400 italic font-normal">N/A</span>
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Resume / CV</span>
                        <p id="info-resume" class="col-span-2 font-medium">
                            @if($detail->resume_path ?? null)
                                <a href="{{ asset('storage/' . $detail->resume_path) }}" target="_blank" class="inline-flex items-center gap-1.5 text-teal-600 hover:text-teal-700 hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    View Resume
                                </a>
                            @else
                                <span class="text-gray-400 italic font-normal">No resume uploaded</span>
                            @endif
                        </p>
                    </div>
                </div>
            </section>

            {{-- 4. Motivation & Preferences --}}
            <section class="info-card bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Goals & Availability</h2>
                        <p class="text-xs text-gray-400">Your expectations and timeline</p>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <div class="grid grid-cols-3 gap-2">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Start Date</span>
                        <p id="info-start-date" class="col-span-2 font-medium text-gray-800">
                            {{ isset($detail->preferred_start_date) ? $detail->preferred_start_date->format('F d, Y') : 'N/A' }}
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Availability</span>
                        <p id="info-availability" class="col-span-2 font-medium text-gray-800 capitalize">{{ str_replace('_', ' ', $detail->availability ?? 'N/A') }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Source</span>
                        <p id="info-source" class="col-span-2 font-medium text-gray-800 capitalize">{{ str_replace('_', ' ', $detail->referral_source ?? 'N/A') }}</p>
                    </div>
                    <div class="flex flex-col gap-1 border-t border-gray-50 pt-3">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Motivation Statement</span>
                        <p id="info-motivation" class="font-medium text-gray-800 leading-relaxed mt-1">
                            {{ $detail->motivation ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </div>

    {{-- Logout Confirmation Modal --}}
    <div id="logoutModal" class="modal-backdrop fixed inset-0 z-[60] flex items-center justify-center bg-black/40">
        <div class="modal-panel bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-0 overflow-hidden">
            <div class="flex items-center justify-between px-6 pt-6 pb-1">
                <h3 class="text-base font-bold text-gray-800">Log out</h3>
                <button onclick="closeLogoutModal()"
                    class="w-7 h-7 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-6 pb-6 pt-3">
                <p class="text-sm text-gray-500 leading-relaxed">Are you sure you want to log out of your dashboard? You can always sign back in later to check your application status.</p>
            </div>
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100">
                <button onclick="closeLogoutModal()"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors text-center">
                    Cancel
                </button>
                <button onclick="document.getElementById('logout-form').submit();"
                    class="flex-1 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition-colors text-center">
                    Log out
                </button>
            </div>
        </div>
    </div>

    {{-- Home Confirmation Modal --}}
    <div id="homeModal" class="modal-backdrop fixed inset-0 z-[60] flex items-center justify-center bg-black/40">
        <div class="modal-panel bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-0 overflow-hidden">
            <div class="flex items-center justify-between px-6 pt-6 pb-1">
                <h3 class="text-base font-bold text-gray-800">Go to Home Page</h3>
                <button onclick="closeHomeModal()"
                    class="w-7 h-7 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-6 pb-6 pt-3">
                <p class="text-sm text-gray-500 leading-relaxed">You are about to leave your dashboard and go back to the landing page. Your application data is safely saved and you can return anytime.</p>
            </div>
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100">
                <button onclick="closeHomeModal()"
                    class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors text-center">
                    Stay Here
                </button>
                <a href="{{ route('welcome') }}"
                    class="flex-1 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition-colors text-center">
                    Go to Home
                </a>
            </div>
        </div>
    </div>

    <script>
        function openLogoutModal() {
            document.getElementById('logoutModal').classList.add('active');
        }
        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
        }
        document.getElementById('logoutModal').addEventListener('click', function (e) {
            if (e.target === this) closeLogoutModal();
        });

        function openHomeModal() {
            document.getElementById('homeModal').classList.add('active');
        }
        function closeHomeModal() {
            document.getElementById('homeModal').classList.remove('active');
        }
        document.getElementById('homeModal').addEventListener('click', function (e) {
            if (e.target === this) closeHomeModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeLogoutModal();
                closeHomeModal();
            }
        });
    </script>
</body>

</html>

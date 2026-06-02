<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration - InterLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #0A170F; color: white; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full space-y-8 bg-[#112417] p-10 rounded-2xl shadow-xl border border-white/10">
        <div>
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/Logos/LWDM.png') }}" alt="InterLink Logo" class="h-12 w-auto">
            </div>
            <h2 class="text-center text-3xl font-extrabold text-white">
                Complete your company profile
            </h2>
            <p class="mt-2 text-center text-sm text-gray-400">
                Tell us a little bit more about your company to get started.
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="{{ route('company.setup.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                
                <div class="sm:col-span-2">
                    <label for="company_name" class="block text-sm font-medium text-gray-300">Company Name *</label>
                    <div class="mt-1">
                        <input id="company_name" name="company_name" type="text" required class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="Acme Corp">
                    </div>
                    @error('company_name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="website" class="block text-sm font-medium text-gray-300">Website URL</label>
                    <div class="mt-1">
                        <input id="website" name="website" type="url" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="https://acme.com">
                    </div>
                    @error('website')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="industry" class="block text-sm font-medium text-gray-300">Industry</label>
                    <div class="mt-1">
                        <input id="industry" name="industry" type="text" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="e.g. Technology, Finance">
                    </div>
                    @error('industry')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="company_size" class="block text-sm font-medium text-gray-300">Company Size</label>
                    <div class="mt-1">
                        <select id="company_size" name="company_size" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-[#0A170F] text-white">
                            <option value="">Select size</option>
                            <option value="1-10">1-10 employees</option>
                            <option value="11-50">11-50 employees</option>
                            <option value="51-200">51-200 employees</option>
                            <option value="201-500">201-500 employees</option>
                            <option value="500+">500+ employees</option>
                        </select>
                    </div>
                    @error('company_size')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-300">Country</label>
                    <div class="mt-1">
                        <input id="country" name="country" type="text" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="Country">
                    </div>
                    @error('country')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-300">City / Headquarters</label>
                    <div class="mt-1">
                        <input id="city" name="city" type="text" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="City">
                    </div>
                    @error('city')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-300">Company Description</label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="4" class="appearance-none block w-full px-3 py-2 border border-white/20 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm bg-transparent text-white" placeholder="Tell us about what your company does..."></textarea>
                    </div>
                    @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-md text-white bg-[#00c896] hover:bg-[#00a87e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00c896] transition-colors">
                    Complete Setup
                </button>
            </div>
        </form>
    </div>
</body>
</html>

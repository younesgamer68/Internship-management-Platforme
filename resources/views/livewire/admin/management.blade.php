<div class="space-y-8">
    <div id="overview" class="flex flex-col gap-2 scroll-mt-24">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100">InternLink Admin</h1>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">Manage companies and register company managers or interns.
        </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-zinc-200 bg-white p-5 dark:border-zinc-800 dark:bg-zinc-900">
            <div class="text-xs uppercase tracking-wider text-zinc-500">Companies</div>
            <div class="mt-2 text-3xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $this->companyCount }}</div>
        </div>
        <div class="rounded-2xl border border-zinc-200 bg-white p-5 dark:border-zinc-800 dark:bg-zinc-900">
            <div class="text-xs uppercase tracking-wider text-zinc-500">Interns</div>
            <div class="mt-2 text-3xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $this->internCount }}</div>
        </div>
        <div
            class="rounded-2xl border border-zinc-200 bg-white p-5 dark:border-zinc-800 dark:bg-zinc-900 md:col-span-2">
            <div class="text-xs uppercase tracking-wider text-zinc-500">Admin account</div>
            <div class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">admin@internlink.test / AdminPass123!</div>
        </div>
    </div>

    @if (session('company-created'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('company-created') }}
        </div>
    @endif

    @if (session('intern-created'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('intern-created') }}
        </div>
    @endif

    <div class="grid gap-6 xl:grid-cols-2">
        <section id="companies"
            class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 scroll-mt-24">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Register a company</h2>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Create the company and its manager account in one
                step.</p>

            <form wire:submit="createCompany" class="mt-6 space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Company name</label>
                    <input wire:model="companyName" type="text"
                        class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                    @error('companyName') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Company slug</label>
                    <input wire:model="companySlug" type="text" placeholder="optional-company-slug"
                        class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                    @error('companySlug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Company
                            email</label>
                        <input wire:model="companyEmail" type="email"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('companyEmail') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Phone</label>
                        <input wire:model="companyPhone" type="text"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('companyPhone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="border-t border-zinc-200 pt-4 dark:border-zinc-800">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Manager
                                name</label>
                            <input wire:model="managerName" type="text"
                                class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                            @error('managerName') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Manager
                                email</label>
                            <input wire:model="managerEmail" type="email"
                                class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                            @error('managerEmail') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Manager
                            password</label>
                        <input wire:model="managerPassword" type="password"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('managerPassword') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-full bg-emerald-500 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-600">Create
                    company</button>
            </form>
        </section>

        <section id="interns"
            class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-800 dark:bg-zinc-900 scroll-mt-24">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Register an intern</h2>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Assign an intern to a company and generate login
                credentials.</p>

            <form wire:submit="createIntern" class="mt-6 space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Company</label>
                    <select wire:model="internCompanyId"
                        class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950">
                        <option value="">Choose a company</option>
                        @foreach ($this->companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }} ({{ $company->slug }})</option>
                        @endforeach
                    </select>
                    @error('internCompanyId') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Intern
                            name</label>
                        <input wire:model="internName" type="text"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('internName') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Intern
                            email</label>
                        <input wire:model="internEmail" type="email"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('internEmail') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Intern
                            password</label>
                        <input wire:model="internPassword" type="password"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('internPassword') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-zinc-700 dark:text-zinc-300">Position</label>
                        <input wire:model="internPosition" type="text"
                            class="w-full rounded-xl border-zinc-200 bg-zinc-50 px-4 py-3 text-sm dark:border-zinc-800 dark:bg-zinc-950" />
                        @error('internPosition') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-full bg-zinc-900 px-5 py-3 text-sm font-semibold text-white hover:bg-zinc-800 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-white">Create
                    intern</button>
            </form>
        </section>
    </div>
</div>
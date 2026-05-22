<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\InternProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Management extends Component
{
    public string $companyName = '';

    public string $companySlug = '';

    public string $companyEmail = '';

    public ?string $companyPhone = null;

    public string $managerName = '';

    public string $managerEmail = '';

    public string $managerPassword = '';

    public ?int $internCompanyId = null;

    public string $internName = '';

    public string $internEmail = '';

    public string $internPassword = '';

    public ?string $internPosition = 'Intern';

    public function mount(): void
    {
        $this->companySlug = '';
    }

    #[Computed]
    public function companies()
    {
        return Company::query()->select(['id', 'name', 'slug'])->orderBy('name', 'asc')->get();
    }

    #[Computed]
    public function companyCount(): int
    {
        return Company::query()->count('*');
    }

    #[Computed]
    public function internCount(): int
    {
        return User::query()->where('role', 'intern')->count('*');
    }

    public function createCompany(): void
    {
        $this->validate([
            'companyName' => ['required', 'string', 'min:2', 'max:100'],
            'companySlug' => ['nullable', 'string', 'max:100', 'alpha_dash'],
            'companyEmail' => ['required', 'email', 'max:255', 'unique:companies,email'],
            'companyPhone' => ['nullable', 'string', 'max:30'],
            'managerName' => ['required', 'string', 'min:2', 'max:100'],
            'managerEmail' => ['required', 'email', 'max:255', 'unique:users,email'],
            'managerPassword' => ['required', 'string', 'min:8'],
        ]);

        $baseSlug = $this->companySlug !== '' ? Str::slug($this->companySlug) : Str::slug($this->companyName);
        $slug = $baseSlug;
        $counter = 1;

        while (Company::query()->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        $company = Company::create([
            'name' => $this->companyName,
            'slug' => $slug,
            'email' => $this->companyEmail,
            'phone' => $this->companyPhone,
            'require_client_verification' => false,
            'onboarding_completed_at' => now(),
        ]);

        User::create([
            'company_id' => $company->id,
            'name' => $this->managerName,
            'email' => $this->managerEmail,
            'password' => Hash::make($this->managerPassword),
            'role' => 'company_manager',
            'email_verified_at' => now(),
        ]);

        $this->reset(['companyName', 'companySlug', 'companyEmail', 'companyPhone', 'managerName', 'managerEmail', 'managerPassword']);
        session()->flash('company-created', 'Company and manager created successfully.');
    }

    public function createIntern(): void
    {
        $this->validate([
            'internCompanyId' => ['required', 'exists:companies,id'],
            'internName' => ['required', 'string', 'min:2', 'max:100'],
            'internEmail' => ['required', 'email', 'max:255', 'unique:users,email'],
            'internPassword' => ['required', 'string', 'min:8'],
            'internPosition' => ['nullable', 'string', 'max:100'],
        ]);

        $intern = User::create([
            'company_id' => $this->internCompanyId,
            'name' => $this->internName,
            'email' => $this->internEmail,
            'password' => Hash::make($this->internPassword),
            'role' => 'intern',
            'email_verified_at' => now(),
        ]);

        InternProfile::create([
            'user_id' => $intern->id,
            'company_id' => $this->internCompanyId,
            'position' => $this->internPosition ?: 'Intern',
        ]);

        $this->reset(['internCompanyId', 'internName', 'internEmail', 'internPassword', 'internPosition']);
        session()->flash('intern-created', 'Intern account created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.management');
    }
}
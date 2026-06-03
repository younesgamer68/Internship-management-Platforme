<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Settings extends Component
{
    public $company_name = '';
    public $industry = '';
    public $website = '';
    public $company_size = '';
    public $founded = '';
    public $city = '';
    public $country = '';
    public $description = '';

    public function mount()
    {
        $company = Auth::user()->company;
        if ($company) {
            $this->company_name = $company->company_name ?? '';
            $this->industry = $company->industry ?? '';
            $this->website = $company->website ?? '';
            $this->company_size = $company->company_size ?? '';
            $this->city = $company->city ?? '';
            $this->country = $company->country ?? '';
            $this->description = $company->description ?? '';
        }
    }

    public function saveProfile()
    {
        $company = Auth::user()->company;
        if ($company) {
            $company->update([
                'company_name' => $this->company_name,
                'industry' => $this->industry,
                'website' => $this->website,
                'company_size' => $this->company_size,
                'city' => $this->city,
                'country' => $this->country,
                'description' => $this->description,
            ]);
            
            $this->dispatch('toast', message: 'Profile settings saved!', type: 'success');
        }
    }

    public function render()
    {
        return view('livewire.company.settings');
    }
}

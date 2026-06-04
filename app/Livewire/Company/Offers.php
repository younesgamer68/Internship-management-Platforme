<?php

namespace App\Livewire\Company;

use Livewire\Component;
use App\Models\Internship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Offers extends Component
{
    public $title = '';
    public $location = '';
    public $internship_type = 'Onsite';
    public $description = '';
    
    // New fields
    public $requirements = '';
    public $responsibilities = '';
    public $duration = '';
    public $is_paid = false;
    public $salary = '';
    public $field = '';
    public $experience_level = 'Beginner';
    public $skills_required = '';
    public $deadline = '';
    
    public $showCreateModal = false;
    public $showViewModal = false;
    public $selectedOffer = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'internship_type' => 'required|string',
        'description' => 'required|string|min:10',
        'requirements' => 'nullable|string',
        'responsibilities' => 'nullable|string',
        'duration' => 'required|string|max:255',
        'is_paid' => 'boolean',
        'salary' => 'nullable|string|max:255',
        'field' => 'required|string|max:255',
        'experience_level' => 'required|string|max:255',
        'skills_required' => 'nullable|string',
        'deadline' => 'nullable|date',
    ];

    public function mount()
    {
        if (!Auth::user() || !Auth::user()->company_id) {
            abort(403);
        }
    }
    
    public function openCreateModal()
    {
        $this->reset([
            'title', 'location', 'internship_type', 'description',
            'requirements', 'responsibilities', 'duration', 'is_paid',
            'salary', 'field', 'experience_level', 'skills_required', 'deadline'
        ]);
        $this->showCreateModal = true;
    }
    
    public function closeModal()
    {
        $this->showCreateModal = false;
    }

    public function viewOffer($id)
    {
        $this->selectedOffer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $this->showViewModal = true;
    }

    public function closeViewModal()
    {
        $this->showViewModal = false;
        $this->selectedOffer = null;
    }

    public function saveOffer()
    {
        $this->validate();

        $companyId = Auth::user()->company_id;

        $skillsArray = [];
        if (!empty(trim($this->skills_required))) {
            $skillsArray = array_map('trim', explode(',', $this->skills_required));
        }

        Internship::create([
            'company_id' => $companyId,
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'description' => $this->description,
            'location' => $this->location,
            'internship_type' => $this->internship_type,
            'requirements' => $this->requirements,
            'responsibilities' => $this->responsibilities,
            'duration' => $this->duration,
            'is_paid' => $this->is_paid,
            'salary' => $this->is_paid ? $this->salary : null,
            'field' => $this->field,
            'experience_level' => $this->experience_level,
            'skills_required' => $skillsArray,
            'deadline' => $this->deadline ? $this->deadline : null,
            'status' => 'Open',
            'featured' => false,
            'is_new' => true,
        ]);

        $this->showCreateModal = false;
        
        $this->dispatch('offer-saved'); // can trigger a toast in frontend
    }

    public function closeOffer($id)
    {
        $offer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $offer->update(['status' => 'Closed']);
    }

    public function reopenOffer($id)
    {
        $offer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $offer->update(['status' => 'Open']);
    }

    public function deleteOffer($id)
    {
        $offer = Internship::where('company_id', Auth::user()->company_id)->findOrFail($id);
        $offer->delete();
    }

    public function exportCsv()
    {
        $internships = Internship::where('company_id', Auth::user()->company_id)->get();

        $csvHeader = ['ID', 'Title', 'Location', 'Type', 'Field', 'Level', 'Duration', 'Paid', 'Salary', 'Status', 'Deadline', 'Created At'];
        
        $csvData = [];
        $csvData[] = implode(',', $csvHeader);
        
        foreach ($internships as $internship) {
            $csvData[] = implode(',', [
                $internship->id,
                '"' . str_replace('"', '""', $internship->title) . '"',
                '"' . str_replace('"', '""', $internship->location) . '"',
                $internship->internship_type,
                '"' . str_replace('"', '""', $internship->field) . '"',
                $internship->experience_level,
                '"' . str_replace('"', '""', $internship->duration) . '"',
                $internship->is_paid ? 'Yes' : 'No',
                '"' . str_replace('"', '""', $internship->salary) . '"',
                $internship->status,
                $internship->deadline,
                $internship->created_at,
            ]);
        }

        $csvString = implode("\n", $csvData);

        return response()->streamDownload(function () use ($csvString) {
            echo $csvString;
        }, 'internship_offers.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function render()
    {
        $internships = Internship::where('company_id', Auth::user()->company_id)
            ->withCount('applications')
            ->latest()
            ->get();

        return view('livewire.company.offers', [
            'internships' => $internships
        ]);
    }
}

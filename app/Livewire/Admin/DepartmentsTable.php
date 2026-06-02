<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department;
use App\Models\University;

class DepartmentsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $universityFilter = '';
    public $facultyFilter = '';
    public $statusFilter = '';

    // Modal state
    public $showAddModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;

    // Form fields
    public $departmentId;
    public $name;
    public $faculty;
    public $university_id;
    public $head_name;
    public $status = 'active';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingUniversityFilter()
    {
        $this->resetPage();
    }

    public function updatingFacultyFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function getDepartmentsProperty()
    {
        return Department::with('university')
            ->withCount('students')
            ->withCount(['applications as active_internships_count' => function ($query) {
                $query->whereIn('applications.status', ['accepted', 'hired', 'active']); // Guessing statuses
            }])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('head_name', 'like', '%' . $this->search . '%');
            })
            ->when($this->universityFilter, function ($query) {
                $query->whereHas('university', function ($q) {
                    $q->where('name', $this->universityFilter);
                });
            })
            ->when($this->facultyFilter, function ($query) {
                $query->where('faculty', $this->facultyFilter);
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->paginate(10);
    }

    public function getUniversitiesProperty()
    {
        return University::orderBy('name')->get();
    }

    public function getFacultiesProperty()
    {
        return Department::select('faculty')
            ->whereNotNull('faculty')
            ->distinct()
            ->orderBy('faculty')
            ->pluck('faculty');
    }

    public function getStatsProperty()
    {
        return [
            'total' => Department::count(),
            'active' => Department::where('status', 'active')->count(),
            'pending_inactive' => Department::whereIn('status', ['pending', 'inactive'])->count(),
            'internships' => \App\Models\Application::whereHas('user', function($q) {
                $q->whereNotNull('department_id')->where('role', 'intern');
            })->whereIn('status', ['accepted', 'hired', 'active'])->count(),
        ];
    }

    public function openAddModal()
    {
        $this->resetForm();
        $this->showAddModal = true;
    }

    public function closeAddModal()
    {
        $this->showAddModal = false;
        $this->resetValidation();
    }

    public function openEditModal($id)
    {
        $dept = Department::findOrFail($id);
        $this->departmentId = $dept->id;
        $this->name = $dept->name;
        $this->faculty = $dept->faculty;
        $this->university_id = $dept->university_id;
        $this->head_name = $dept->head_name;
        $this->status = $dept->status;
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->resetValidation();
    }

    public function confirmDelete($id)
    {
        $this->departmentId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
    }

    public function resetForm()
    {
        $this->departmentId = null;
        $this->name = '';
        $this->faculty = '';
        $this->university_id = '';
        $this->head_name = '';
        $this->status = 'active';
    }

    public function saveDepartment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'head_name' => 'nullable|string|max:255',
            'status' => 'required|in:active,pending,inactive',
        ]);

        Department::create([
            'name' => $this->name,
            'faculty' => $this->faculty,
            'university_id' => $this->university_id,
            'head_name' => $this->head_name,
            'status' => $this->status,
        ]);

        $this->closeAddModal();
        session()->flash('message', 'Department successfully added.');
    }

    public function updateDepartment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'head_name' => 'nullable|string|max:255',
            'status' => 'required|in:active,pending,inactive',
        ]);

        $dept = Department::findOrFail($this->departmentId);
        $dept->update([
            'name' => $this->name,
            'faculty' => $this->faculty,
            'university_id' => $this->university_id,
            'head_name' => $this->head_name,
            'status' => $this->status,
        ]);

        $this->closeEditModal();
        session()->flash('message', 'Department successfully updated.');
    }

    public function deleteDepartment()
    {
        $dept = Department::findOrFail($this->departmentId);
        $dept->delete();

        $this->closeDeleteModal();
        session()->flash('message', 'Department successfully deleted.');
    }

    public function render()
    {
        return view('livewire.admin.departments-table', [
            'departments' => $this->departments,
            'universities' => $this->universities,
            'faculties' => $this->faculties,
            'stats' => $this->stats,
        ]);
    }
}

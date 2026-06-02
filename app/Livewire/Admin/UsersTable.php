<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\InternProfile;
use App\Models\User;
use App\Scopes\CompanyScope;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    // Filters and search
    public $search = '';
    public $roleFilter = '';
    public $statusFilter = ''; // 'Active', 'Pending', 'Inactive'
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    // Modal state controls
    public $showAddModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $showViewModal = false;

    // Form fields
    public $userId;
    public $name = '';
    public $email = '';
    public $role = 'intern'; // 'admin', 'company_manager', 'intern', 'operator'
    public $companyId = '';
    public $password = '';
    public $bio = '';
    public $status = 'Active';

    // View details state
    public $viewUser = null;

    protected $listeners = ['refreshUsersTable' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function sortByColumn($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->roleFilter = '';
        $this->statusFilter = '';
        $this->resetPage();
    }

    #[Computed]
    public function hasActiveFilters()
    {
        return $this->search !== '' || $this->roleFilter !== '' || $this->statusFilter !== '';
    }

    // Computed property for companies list
    #[Computed]
    public function companies()
    {
        return Company::query()->orderBy('name')->get();
    }

    // Fetch and filter users
    public function getUsers()
    {
        $query = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->with('company');

        // Search filter (name, email, or company name)
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhereHas('company', function ($subQ) {
                      $subQ->where('name', 'like', '%' . $this->search . '%');
                  });
            });
        }

        // Role filter
        if ($this->roleFilter) {
            // Map UI role values to DB roles
            $roleMap = [
                'Student' => 'intern',
                'Company' => 'company_manager',
                'Admin' => 'admin',
                'Operator' => 'operator'
            ];
            $dbRole = $roleMap[$this->roleFilter] ?? $this->roleFilter;
            $query->where('role', $dbRole);
        }

        // Status filter
        if ($this->statusFilter) {
            if ($this->statusFilter === 'Inactive') {
                // Soft deleted users
                $query->whereNotNull('deleted_at');
            } elseif ($this->statusFilter === 'Pending') {
                // Pending invite (not deleted and password/google_id is null)
                $query->whereNull('deleted_at')
                      ->whereNull('password')
                      ->whereNull('google_id');
            } elseif ($this->statusFilter === 'Active') {
                // Active (not deleted and has password or google_id)
                $query->whereNull('deleted_at')
                      ->where(function ($q) {
                          $q->whereNotNull('password')
                            ->orWhereNotNull('google_id');
                      });
            }
        }

        // Sorting
        if ($this->sortBy === 'company') {
            $query->join('companies', 'users.company_id', '=', 'companies.id')
                  ->select('users.*')
                  ->orderBy('companies.name', $this->sortDirection);
        } else {
            $query->orderBy($this->sortBy, $this->sortDirection);
        }

        return $query->paginate($this->perPage);
    }

    // CRUD: Add User Modal
    public function openAddModal()
    {
        $this->resetValidation();
        $this->resetForm();
        $this->showAddModal = true;
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|in:admin,company_manager,intern,operator',
            'companyId' => 'required|exists:companies,id',
            'password' => 'required|string|min:8',
            'bio' => 'nullable|string|max:1000',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'company_id' => $this->companyId,
            'password' => Hash::make($this->password),
            'email_verified_at' => now(),
        ]);

        if ($this->role === 'intern') {
            InternProfile::create([
                'user_id' => $user->id,
                'company_id' => $this->companyId,
                'position' => 'Intern',
                'bio' => $this->bio,
            ]);
        }

        $this->showAddModal = false;
        $this->resetForm();
        $this->dispatch('show-toast', message: 'User created successfully!', type: 'success');
    }

    // CRUD: Edit User Modal
    public function openEditModal($id)
    {
        $this->resetValidation();
        $user = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->companyId = $user->company_id;
        $this->password = ''; // Keep blank unless updating
        $this->status = $user->trashed() ? 'Inactive' : ($user->isPendingInvite() ? 'Pending' : 'Active');

        // Fetch bio from InternProfile if it exists
        $profile = InternProfile::where('user_id', $user->id)->first();
        $this->bio = $profile ? $profile->bio : '';

        $this->showEditModal = true;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
            'role' => 'required|in:admin,company_manager,intern,operator',
            'companyId' => 'required|exists:companies,id',
            'password' => 'nullable|string|min:8',
            'bio' => 'nullable|string|max:1000',
            'status' => 'required|in:Active,Pending,Inactive',
        ]);

        $user = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->findOrFail($this->userId);

        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'company_id' => $this->companyId,
        ];

        if ($this->password) {
            $updateData['password'] = Hash::make($this->password);
        }

        // If status was changed to Pending, we clear credentials
        if ($this->status === 'Pending') {
            $updateData['password'] = null;
            $updateData['google_id'] = null;
        }

        $user->update($updateData);

        // Update/create InternProfile if role is intern
        if ($this->role === 'intern') {
            InternProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'company_id' => $this->companyId,
                    'bio' => $this->bio,
                ]
            );
        } else {
            // Delete profile if role changed from intern
            InternProfile::where('user_id', $user->id)->delete();
        }

        // Handle soft-deletes/activation status
        if ($this->status === 'Inactive' && !$user->trashed()) {
            $user->delete();
        } elseif ($this->status !== 'Inactive' && $user->trashed()) {
            $user->restore();
        }

        $this->showEditModal = false;
        $this->resetForm();
        $this->dispatch('show-toast', message: 'User updated successfully!', type: 'success');
    }

    // CRUD: Delete User Confirmation Modal
    public $deleteConfirmName = '';
    public $deleteConfirmEmail = '';
    public $deleteConfirmCheckbox = false;

    public function openDeleteModal($id)
    {
        $user = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->findOrFail($id);

        $this->userId = $user->id;
        $this->deleteConfirmName = $user->name;
        $this->deleteConfirmEmail = $user->email;
        $this->deleteConfirmCheckbox = false;

        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        if (!$this->deleteConfirmCheckbox) {
            return;
        }

        $user = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->findOrFail($this->userId);

        // Don't let users delete themselves
        if ($user->id === auth()->id()) {
            $this->dispatch('show-toast', message: 'You cannot delete your own account.', type: 'danger');
            $this->showDeleteModal = false;
            return;
        }

        $user->delete();

        $this->showDeleteModal = false;
        $this->dispatch('show-toast', message: 'User deleted successfully.', type: 'danger');
    }

    // CRUD: View Details Modal
    public function openViewModal($id)
    {
        $user = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->with('company')->findOrFail($id);
        
        $profile = InternProfile::where('user_id', $user->id)->first();
        
        $this->viewUser = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'company_name' => $user->company?->name ?? 'N/A',
            'joined_date' => $user->created_at->format('M d, Y'),
            'status' => $user->trashed() ? 'Inactive' : ($user->isPendingInvite() ? 'Pending' : 'Active'),
            'bio' => $profile ? $profile->bio : 'No bio/notes provided.',
            'initials' => $user->initials(),
            'avatar_color' => $this->getAvatarColor($user->role)
        ];

        $this->showViewModal = true;
    }

    private function getAvatarColor($role)
    {
        $colors = [
            'intern' => '#00b1aa',
            'company_manager' => '#8B5CF6',
            'admin' => '#EF4444',
            'operator' => '#3B82F6'
        ];
        return $colors[$role] ?? '#444444';
    }

    // CSV Export
    public function export()
    {
        $users = User::withoutGlobalScope(CompanyScope::class)->withTrashed()->with('company')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=users_export.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($users) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Email', 'Role', 'Organization', 'Status', 'Joined Date']);

            foreach ($users as $user) {
                $status = $user->trashed() ? 'Inactive' : ($user->isPendingInvite() ? 'Pending' : 'Active');
                fputcsv($file, [
                    $user->name,
                    $user->email,
                    ucfirst($user->role),
                    $user->company?->name ?? 'N/A',
                    $status,
                    $user->created_at->toDateTimeString()
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function resetForm()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->role = 'intern';
        $this->companyId = '';
        $this->password = '';
        $this->bio = '';
        $this->status = 'Active';
    }

    public function render()
    {
        return view('livewire.admin.users-table', [
            'usersList' => $this->getUsers()
        ]);
    }
}

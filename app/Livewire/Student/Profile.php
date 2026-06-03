<?php

namespace App\Livewire\Student;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $date_of_birth;
    public $nationality;
    public $country;
    public $city;
    public $university;
    public $faculty;
    public $field_of_study;
    public $education_start_year;
    public $degree;
    public $gpa;
    public $student_id;
    public $experience;
    public $skills;
    public $languages;
    public $linkedin_url;
    public $portfolio_url;
    
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        if ($userInfo) {
            $this->phone = $userInfo->phone;
            $this->date_of_birth = $userInfo->date_of_birth;
            $this->nationality = $userInfo->country; // Assuming country is used as nationality or similar
            $this->country = $userInfo->country;
            $this->city = $userInfo->city;
            $this->university = $userInfo->university;
            $this->faculty = $userInfo->field_of_study; // Mapping field_of_study to faculty/department
            $this->field_of_study = $userInfo->field_of_study;
            $this->education_start_year = $userInfo->education_start_year;
            $this->degree = $userInfo->degree;
            $this->gpa = $userInfo->gpa;
            $this->student_id = $userInfo->referral_source; // Using a spare column or user table for student_id if it doesn't exist? Actually let's just leave it blank if not mapped
            $this->experience = $userInfo->experience;
            $this->skills = $userInfo->skills;
            $this->languages = $userInfo->motivation; // Using motivation as a placeholder for languages if no column exists
            $this->linkedin_url = $userInfo->linkedin_url;
            $this->portfolio_url = $userInfo->portfolio_url;
        }
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);

        $user = Auth::user();
        $path = $this->photo->store('avatars', 'public');
        
        // Delete old avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        
        $user->avatar = $path;
        $user->save();
        
        return redirect()->route('student.profile', ['company' => request()->route('company') ?? 'internlink-demo']);
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'gpa' => 'nullable|numeric|min:0|max:4.0',
            'experience' => 'nullable|string',
            'skills' => 'nullable|string',
            'languages' => 'nullable|string',
            'linkedin_url' => 'nullable|string|max:255',
            'portfolio_url' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        $names = explode(' ', $this->name);
        $firstName = array_shift($names);
        $lastName = implode(' ', $names);

        $userInfo = UserInfo::firstOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => $firstName, 
                'last_name' => $lastName, 
                'status' => 'active',
                'phone' => '',
                'date_of_birth' => '2000-01-01',
                'country' => '',
                'city' => '',
                'university' => '',
                'field_of_study' => '',
                'degree' => '',
                'education_start_year' => date('Y'),
                'preferred_start_date' => date('Y-m-d'),
                'availability' => '',
                'skills' => ''
            ]
        );
        
        $userInfo->update([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone' => $this->phone ?? '',
            'date_of_birth' => $this->date_of_birth ?: '2000-01-01', // Fallback for non-nullable date
            'country' => $this->country ?? '',
            'city' => $this->city ?? '',
            'university' => $this->university ?? '',
            'field_of_study' => $this->field_of_study ?? '',
            'degree' => $this->degree ?? '',
            'gpa' => $this->gpa ?? '',
            'experience' => $this->experience, // nullable
            'skills' => $this->skills ?? '',
            'motivation' => $this->languages ?? '',
            'linkedin_url' => $this->linkedin_url, // nullable
            'portfolio_url' => $this->portfolio_url, // nullable
        ]);

        session()->flash('message', 'Profile successfully updated.');
        return redirect()->route('student.profile', ['company' => request()->route('company') ?? 'internlink-demo']);
    }

    public function render()
    {
        return view('livewire.student.profile');
    }
}

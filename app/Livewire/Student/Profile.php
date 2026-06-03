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
    public $university;
    public $degree;
    public $gpa;
    public $country;
    public $city;
    public $experience;
    public $skills;
    
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        if ($userInfo) {
            $this->phone = $userInfo->phone;
            $this->university = $userInfo->university;
            $this->degree = $userInfo->degree;
            $this->gpa = $userInfo->gpa;
            $this->country = $userInfo->country;
            $this->city = $userInfo->city;
            $this->experience = $userInfo->experience;
            $this->skills = $userInfo->skills;
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
        
        return redirect()->route('student.profile');
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:255',
            'gpa' => 'nullable|numeric|min:0|max:4.0',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'experience' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        $userInfo = UserInfo::firstOrCreate(
            ['user_id' => $user->id],
            ['first_name' => explode(' ', $this->name)[0], 'last_name' => explode(' ', $this->name)[1] ?? '']
        );
        
        $userInfo->update([
            'phone' => $this->phone,
            'university' => $this->university,
            'degree' => $this->degree,
            'gpa' => $this->gpa,
            'country' => $this->country,
            'city' => $this->city,
            'experience' => $this->experience,
            'skills' => $this->skills,
        ]);

        session()->flash('message', 'Profile successfully updated.');
        return redirect()->route('student.profile');
    }

    public function render()
    {
        return view('livewire.student.profile');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'university_id')->where('users.role', 'intern');
    }

    public function applications()
    {
        return $this->hasManyThrough(Application::class, User::class, 'university_id', 'user_id')->where('users.role', 'intern');
    }
}

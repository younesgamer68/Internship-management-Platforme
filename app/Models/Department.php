<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'department_id')->where('users.role', 'intern');
    }

    public function applications()
    {
        return $this->hasManyThrough(Application::class, User::class, 'department_id', 'user_id')->where('users.role', 'intern');
    }
}

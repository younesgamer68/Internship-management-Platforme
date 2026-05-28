<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'skills_required' => 'array',
        'is_paid' => 'boolean',
        'featured' => 'boolean',
        'is_new' => 'boolean',
        'deadline' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'internship_skills');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

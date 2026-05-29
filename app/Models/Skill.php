<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function internships()
    {
        return $this->belongsToMany(Internship::class, 'internship_skills');
    }
}

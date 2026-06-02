<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = [
        'user_id',
        // Step 1: Personal
        'first_name',
        'last_name',
        'phone',
        'date_of_birth',
        'gender',
        'country',
        'city',
        // Step 2: Education
        'university',
        'degree',
        'field_of_study',
        'education_start_year',
        'education_end_year',
        'gpa',
        // Step 3: Experience
        'experience',
        'skills',
        'linkedin_url',
        'portfolio_url',
        'resume_path',
        // Step 4: Motivation
        'motivation',
        'preferred_start_date',
        'availability',
        'referral_source',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'preferred_start_date' => 'date',
        'education_start_year' => 'integer',
        'education_end_year' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withoutGlobalScope(\App\Scopes\CompanyScope::class);
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}

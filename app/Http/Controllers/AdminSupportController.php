<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminSupportController extends Controller
{
    public function index($companySlug = null)
    {
        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.support', compact(
            'slug'
        ));
    }
}

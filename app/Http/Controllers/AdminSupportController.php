<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminSupportController extends Controller
{
    public function index($companySlug = null)
    {
        $tickets = Ticket::orderBy('id', 'desc')->get();
        
        $openTickets = Ticket::where('status', 'Open')->count();
        $resolvedTickets = Ticket::where('status', 'Resolved')->orWhere('status', 'Closed')->count();
        $avgResponseTime = '2.4 hours'; // Fake manual data
        $csatScore = '98%'; // Fake manual data

        $slug = $companySlug ?? auth()->user()->company?->slug ?? 'internlink-demo';

        return view('app.admin.support', compact(
            'tickets',
            'openTickets',
            'resolvedTickets',
            'avgResponseTime',
            'csatScore',
            'slug'
        ));
    }
}

<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();
        $companySlug = $user->company ? $user->company->slug : 'internlink-demo';

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard', ['company' => $companySlug]);
        } elseif ($user->isCompanyManager()) {
            return redirect()->route('agent.dashboard', ['company' => $companySlug]);
        } elseif ($user->isIntern()) {
            return redirect()->route('student.dashboard', ['company' => $companySlug]);
        }

        return redirect('/home');
    }
}

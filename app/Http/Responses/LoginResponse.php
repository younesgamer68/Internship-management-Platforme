<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user && $user->role === 'intern') {
            $detail = \App\Models\InternInfoDetail::where('user_id', $user->id)->first();
            if ($detail) {
                return redirect()->route('intern.dashboard');
            }
            // New user - start registration flow
            return $user->career_field
                ? redirect()->route('intern.opportunities')
                : redirect()->route('career_fields');
        }

        return redirect()->route('home');
    }
}

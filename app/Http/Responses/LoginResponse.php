<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user && empty($user->career_field)) {
            return redirect()->route('career_fields');
        }

        return redirect()->route('intern.opportunities');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyQuickRegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'email.required' => 'Please enter your work email address.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        $existingUser = User::query()->where('email', $request->email)->first();

        if ($existingUser && $existingUser->role === 'intern') {
            return redirect()->route('role.conflict');
        }

        $rawName = explode('@', $request->email)[0];
        $name = Str::title(str_replace(['.', '_', '-'], ' ', $rawName));

        $user = $existingUser ?: User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => null,
            'role' => 'admin',
            'email_verified_at' => null,
        ]);

        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        DB::table('email_verification_codes')
            ->where('user_id', $user->id)
            ->delete();

        DB::table('email_verification_codes')->insert([
            'user_id' => $user->id,
            'code' => $code,
            'expires_at' => now()->addMinute(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->put('pending_user_email', $user->email);

        try {
            Mail::to($user->email)->queue(new \App\Mail\VerificationCode($code));
        } catch (\Exception $e) {
            logger()->error('Verification email failed for user '.$user->id.': '.$e->getMessage());
        }

        return redirect()->route('verification.guest.notice')
            ->with('status', 'verification-code-sent');
    }
}

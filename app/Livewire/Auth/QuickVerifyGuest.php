<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.empty')]
class QuickVerifyGuest extends Component
{
    public string $code = '';

    public bool $codeSent = true;

    protected $rules = [
        'code' => ['required', 'string', 'size:6'],
    ];

    public function mount(): void
    {
        if (! session()->has('pending_user_email')) {
            $this->redirectRoute('get_started');
        }
    }

    public function verify()
    {
        $this->validateOnly('code');

        $email = session('pending_user_email');
        $user = User::query()->where('email', $email)->first();

        if (! $user) {
            $this->addError('code', 'We could not find the account for this email.');
            return;
        }

        $verification = DB::table('email_verification_codes')
            ->where('user_id', $user->id)
            ->where('code', $this->code)
            ->where('expires_at', '>', now())
            ->first();

        if (! $verification) {
            $this->addError('code', 'Invalid or expired code');
            return;
        }

        $user->forceFill([
            'email_verified_at' => now(),
        ])->save();

        DB::table('email_verification_codes')->where('user_id', $user->id)->delete();

        Auth::login($user);
        session()->forget('pending_user_email');

        return redirect()->route('career_fields');
    }

    public function resendCode(): void
    {
        $email = session('pending_user_email');
        $user = User::query()->where('email', $email)->first();

        if (! $user) {
            return;
        }

        DB::table('email_verification_codes')->where('user_id', $user->id)->delete();

        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        DB::table('email_verification_codes')->insert([
            'user_id' => $user->id,
            'code' => $code,
            'expires_at' => now()->addMinute(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

            Mail::to($user->email)->queue(new \App\Mail\VerificationCode($code));

        session()->flash('status', 'verification-code-sent');
    }

    public function render()
    {
        return view('livewire.auth.quick-verify-guest');
    }
}

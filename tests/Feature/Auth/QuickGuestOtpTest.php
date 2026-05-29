<?php

use App\Mail\VerificationCode;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

it('sends a verification code and verifies guest email', function () {
    Mail::fake();

    $email = 'test+guest@example.com';

    $this->post(route('register.quick'), [
        'email' => $email,
    ])->assertRedirect(route('verification.guest.notice'));

    $user = User::query()->where('email', $email)->first();
    expect($user)->not->toBeNull();

    $codeRow = DB::table('email_verification_codes')->where('user_id', $user->id)->first();
    expect($codeRow)->not->toBeNull();

    Mail::assertQueued(VerificationCode::class, function ($mail) use ($email) {
        return $mail->hasTo($email);
    });

    session()->put('pending_user_email', $email);

    Livewire::test(\App\Livewire\Auth\QuickVerifyGuest::class)
        ->set('code', $codeRow->code)
        ->call('verify')
        ->assertRedirect(route('career_fields'));

    $this->assertAuthenticated();
});

it('sends a verification code and verifies email for an already registered user with a password', function () {
    Mail::fake();

    $email = 'existing+user@example.com';
    
    // Create an existing user with a password
    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password'),
        'role' => 'intern',
        'email_verified_at' => null,
    ]);

    $this->post(route('register.quick'), [
        'email' => $email,
    ])->assertRedirect(route('verification.guest.notice'));

    $codeRow = DB::table('email_verification_codes')->where('user_id', $user->id)->first();
    expect($codeRow)->not->toBeNull();

    Mail::assertQueued(VerificationCode::class, function ($mail) use ($email) {
        return $mail->hasTo($email);
    });

    session()->put('pending_user_email', $email);

    Livewire::test(\App\Livewire\Auth\QuickVerifyGuest::class)
        ->set('code', $codeRow->code)
        ->call('verify')
        ->assertRedirect(route('career_fields'));

    $this->assertAuthenticatedAs($user);
});

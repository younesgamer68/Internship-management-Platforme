<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function redirect(Request $request): RedirectResponse
    {
        if (! $this->hasGoogleCredentials()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google login is not configured yet. Set GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET in .env.']);
        }

        if ($request->has('role')) {
            session(['google_signup_role' => $request->query('role')]);
        } else {
            $referer = $request->headers->get('referer');
            if ($referer && str_contains($referer, 'company')) {
                session(['google_signup_role' => 'company_manager']);
            } else {
                session(['google_signup_role' => 'intern']);
            }
        }

        config(['services.google.redirect' => $this->redirectUrl($request)]);

        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        if (! $this->hasGoogleCredentials()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google login is not configured yet. Set GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET in .env.']);
        }

        config(['services.google.redirect' => $this->redirectUrl($request)]);

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google sign-in could not be completed. Please try again.']);
        }

        $email = trim((string) $googleUser->getEmail());
        $googleId = trim((string) $googleUser->getId());

        if ($email === '' || $googleId === '') {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google did not return the required account information.']);
        }

        $user = User::withoutGlobalScopes()
            ->withTrashed()
            ->where('email', $email)
            ->first();

        if (! $user) {
            $user = User::withoutGlobalScopes()
                ->withTrashed()
                ->where('google_id', $googleId)
                ->first();
        }

        if ($user?->trashed()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'This account is currently unavailable. Please contact support.']);
        }

        if ($user && $user->isPendingInvite()) {
            session()->put('pending_user_email', $user->email);

            return redirect()->route('set-password');
        }

        $name = $this->resolveName($googleUser, $email);
        $avatar = $this->resolveAvatar($googleUser);
        $emailVerified = $this->isEmailVerified($googleUser);

        if (! $user) {
            $role = session()->pull('google_signup_role', 'intern');
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => null,
                'google_id' => $googleId,
                'avatar' => $avatar,
                'email_verified_at' => $emailVerified ? now() : null,
                'role' => $role,
            ]);
        } else {
            $updates = [];

            if ($user->google_id !== $googleId) {
                $updates['google_id'] = $googleId;
            }

            if ($avatar && $user->avatar !== $avatar) {
                $updates['avatar'] = $avatar;
            }

            if (! $user->name) {
                $updates['name'] = $name;
            }

            if ($emailVerified && ! $user->hasVerifiedEmail()) {
                $updates['email_verified_at'] = now();
            }

            if ($updates !== []) {
                $user->forceFill($updates)->save();
            }
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        if (! $user->career_field) {
            return redirect()->route('career_fields');
        }

        return redirect()
            ->route('intern.opportunities')
            ->with('success', 'Welcome '.$user->name.'!');
    }

    private function resolveName(SocialiteUser $googleUser, string $email): string
    {
        return $googleUser->getName()
            ?: $googleUser->getNickname()
            ?: Str::of($email)->before('@')->headline()->toString()
            ?: 'User';
    }

    private function resolveAvatar(SocialiteUser $googleUser): ?string
    {
        $avatar = trim((string) $googleUser->getAvatar());

        return $avatar !== '' ? $avatar : null;
    }

    private function hasGoogleCredentials(): bool
    {
        return filled(config('services.google.client_id')) && filled(config('services.google.client_secret'));
    }

    private function redirectUrl(Request $request): string
    {
        $baseUrl = $request->getSchemeAndHttpHost();

        return rtrim($baseUrl, '/').'/auth/google/callback';
    }

    private function isEmailVerified(SocialiteUser $googleUser): bool
    {
        $raw = method_exists($googleUser, 'getRaw') ? (array) $googleUser->getRaw() : [];

        if (array_key_exists('email_verified', $raw)) {
            return filter_var($raw['email_verified'], FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) ?? true;
        }

        return true;
    }
}
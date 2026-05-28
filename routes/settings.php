<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\NotificationPreferences;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Security;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::redirect('settings', 'settings/profile');
        Route::livewire('settings/profile', Profile::class)->name('profile.edit');

        Route::redirect('settings/password', 'settings/security')->name('user-password.edit');
        Route::livewire('settings/two-factor', TwoFactor::class)
            ->middleware(
                when(
                    Features::canManageTwoFactorAuthentication()
                        && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                    ['password.confirm'],
                    [],
                ),
            )
            ->name('two-factor.show');

        Route::livewire('settings/appearance', Appearance::class)->name('appearance.edit');
        Route::livewire('settings/security', Security::class)->name('settings.security');
        Route::livewire('settings/notifications', NotificationPreferences::class)->name('notifications.preferences');
    });

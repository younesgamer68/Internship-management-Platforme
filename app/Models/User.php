<?php

namespace App\Models;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'university_id',
        'department_id',
        'email_verified_at',
        'google_id',
        'avatar',
        'career_field',
        'role',
        'is_available',
        'assigned_tickets_count',
        'last_assigned_at',
        'status',
        'last_activity',
        'invite_sent_at',
        'invite_expires_at',
        'invite_expired_notified_at',
        'notification_preferences',
        'user_id',
        'provider',
        'join_date',
        'last_login',
        'phone_number',
        'role_name',
        'position',
        'department',
        'line_manager',
        'seconde_line_manager',
    ];

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_available' => 'boolean',
        'assigned_tickets_count' => 'integer',
        'last_assigned_at' => 'datetime',
        'last_activity' => 'datetime',
        'invite_sent_at' => 'datetime',
        'invite_expires_at' => 'datetime',
        'invite_expired_notified_at' => 'datetime',
        'notification_preferences' => 'array',
    ];

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCompanyManager(): bool
    {
        return $this->role === 'company_manager';
    }

    public function isIntern(): bool
    {
        return $this->role === 'intern';
    }

    public function wantsNotification(string $type): bool
    {
        $preferences = $this->notification_preferences ?? [];

        if (! array_key_exists($type, $preferences)) {
            return true;
        }

        return (bool) $preferences[$type];
    }

    public function isOperator(): bool
    {
        return $this->role === 'operator';
    }

    public function isPendingInvite(): bool
    {
        return is_null($this->password) && is_null($this->google_id);
    }

    public function isActive(): bool
    {
        return ! $this->isPendingInvite();
    }

    public function inviteHoursRemaining(): ?int
    {
        if (! $this->isPendingInvite()) {
            return null;
        }

        $expiresAt = $this->invite_expires_at;

        if (! $expiresAt) {
            return null;
        }

        return (int) ceil(now()->floatDiffInHours($expiresAt, false));
    }

    public function isInviteExpiringSoon(): bool
    {
        $hoursRemaining = $this->inviteHoursRemaining();

        return $hoursRemaining !== null && $hoursRemaining > 0 && $hoursRemaining <= 24;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_user')->withPivot('role')->withTimestamps();
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function chatbotSessions()
    {
        return $this->hasMany(ChatbotSession::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    /**
     * Internship offers received by this intern.
     */
    public function receivedOffers()
    {
        return $this->hasMany(InternshipOffer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Scope a query to only include available operators.
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    /**
     * Scope a query to only include online users.
     */
    public function scopeOnline($query)
    {
        return $query->where(function ($builder) {
            $builder->where('status', 'online')
                ->orWhereNull('status');
        });
    }

    /**
     * Check if the user is currently online.
     */
    public function isOnline(): bool
    {
        return $this->status === 'online';
    }

    /**
     * Scope a query to only include operators.
     */
    public function scopeOperators($query)
    {
        return $query->where($query->qualifyColumn('role'), 'operator');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);

        static::updated(function ($user) {
            // Clear company cache when user is updated
            cache()->forget("company.{$user->company_id}.agents");
            cache()->forget("company.{$user->company_id}.categories");
        });

        static::deleted(function ($user) {
            // Clear company cache when user is deleted
            cache()->forget("company.{$user->company_id}.agents");
        });
    }
}

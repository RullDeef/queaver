<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'group_index',
        'graduation_year',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'online',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
    ];

    public function getOnlineAttribute()
    {
        return now()->lt($this->last_seen->addSeconds(config('user-online.expires_after')));
    }

    public function getSemesterAttribute()
    {
        ///TODO: implement
        return 5;
    }

    public function getCourseAttribute()
    {
        ///TODO: implement
        return 3;
    }

    public function isAdmin() {
        return UserRole::for($this)->first()?->role === UserRole::ADMIN;
    }

    public function isModerator() {
        return UserRole::for($this)->first()?->role === UserRole::MODERATOR;
    }
}

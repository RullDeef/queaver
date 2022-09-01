<?php

namespace App\Models;

use App\Models\UserTaskState;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'fullGroupIndex'
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
        ///TODO: check if this is correct
        $res = 2 * $this->course - 1;

        if (now()->month < 6) {
            $res += 1;
        }

        return $res;
    }

    public function getCourseAttribute()
    {
        ///TODO: check if this is correct
        $res = 4 - $this->graduation_year + now()->year;

        if (now()->month > 6) {
            $res++;
        }

        return $res;
    }

    public function getFullGroupIndexAttribute()
    {
        return 'ИУ7-' . $this->semester . $this->group_index;
    }

    public function isAdmin() {
        return UserRole::for($this)->first()?->role === UserRole::ADMIN;
    }

    public function isModerator() {
        return UserRole::for($this)->first()?->role === UserRole::MODERATOR;
    }

    public function places() {
        return $this->hasMany(UserPlace::class);
    }

    public function taskStates() {
        return $this->hasMany(UserTaskState::class);
    }
}

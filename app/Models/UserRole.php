<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public const ADMIN = 'ADMIN';
    public const MODERATOR = 'MODERATOR';

    protected $fillable = [
        'user_id',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * usage: UserRole::for($user)
     */
    public function scopeFor($query, $user)
    {
        return $query->where('user_id', $user->id);
    }
}

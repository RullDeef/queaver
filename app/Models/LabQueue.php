<?php

namespace App\Models;

use App\Models\UserPlace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LabQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'semester',
        'labs_count',
        'priority_policy',
        'creator_id',
        'group_index_indifference',
    ];

    public function creator()
    {
        return $this->belongsTo(
            User::class,
            foreignKey: 'creator_id',
            ownerKey: 'id'
        );
    }

    public function tasks()
    {
        return $this->hasMany(LabTask::class);
    }

    public function userPlaces()
    {
        return $this->hasMany(UserPlace::class);
    }
}

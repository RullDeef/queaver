<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

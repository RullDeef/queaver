<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'title',
        'description',
        'deadline',
        'lab_queue_id',
        'creator_id',
    ];

    protected $casts = [
        'deadline' => 'date'
    ];

    protected $append = ['outdated'];

    public function labQueue()
    {
        return $this->belongsTo(LabQueue::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function getOutdatedAttribute()
    {
        return now()->gt($this->deadline);
    }
}

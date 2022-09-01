<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTaskState extends Model
{
    use HasFactory;

    public const COMPLETED = 'COMPLETED';
    public const IN_QUEUE = 'IN_QUEUE';
    public const IN_PROGRESS = 'IN_PROGRESS';

    protected $fillable = [
        'user_id',
        'lab_task_id',
        'state',
    ];

    protected $append = [
        'completed',
        'pending',
        'in_progress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labTask()
    {
        return $this->belongsTo(LabTask::class);
    }

    public function getCompletedAttribute()
    {
        return $this->state === self::COMPLETED;
    }

    public function getPendingAttribute()
    {
        return $this->state === self::IN_QUEUE;
    }

    public function getInProgressAttribute()
    {
        return $this->state === self::IN_PROGRESS;
    }
}

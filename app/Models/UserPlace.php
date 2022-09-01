<?php

namespace App\Models;

use App\Models\LabTask;
use App\Models\LabQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lab_queue_id',
        'lab_task_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function labQueue()
    {
        return $this->belongsTo(LabQueue::class, 'lab_queue_id');
    }

    public function labTask()
    {
        return $this->belongsTo(LabTask::class, 'lab_task_id');
    }
}

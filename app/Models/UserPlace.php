<?php

namespace App\Models;

use App\Models\LabTask;
use App\Models\LabQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPlace extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'lab_queue_id',
        'lab_task_id',
    ];

    /**
     * Find UserPlace by composite primary key
     */
    public static function find(array $keys)
    {
        return UserPlace::where('user_id', $keys['user_id'])
            ->where('lab_queue_id', $keys['lab_queue_id'])
            ->where('lab_task_id', $keys['lab_task_id'])
            ->first();
    }

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

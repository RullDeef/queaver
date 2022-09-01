<?php

namespace App\Http\Requests;

use App\Models\UserPlace;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserPlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', UserPlace::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lab_queue_id' => ['required', 'exists:lab_queues,id'],
            'lab_task_id' => ['required', 'exists:lab_tasks,id'],
        ];
    }
}

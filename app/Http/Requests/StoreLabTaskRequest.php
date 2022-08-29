<?php

namespace App\Http\Requests;

use App\Models\LabTask;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreLabTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', LabTask::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'index' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1024'],
            // 'deadline' => ['date'],
            'lab_queue_id' => ['required', 'integer', 'exists:lab_queues,id'],
        ];
    }

    public function messages()
    {
        return [
            'index.required' => 'The :attribute is required.',
            'index.integer' => 'The :attribute must be an integer.',
            'title.required' => 'The :attribute is required.',
            'title.string' => 'The :attribute must be a string.',
            'title.max' => 'The :attribute may not be greater than :max characters.',
            'description.required' => 'The :attribute is required.',
            'description.string' => 'The :attribute must be a string.',
            'description.max' => 'The :attribute may not be greater than :max characters.',
            'lab_queue_id.required' => 'The :attribute is required.',
            'lab_queue_id.integer' => 'The :attribute must be an integer.',
            'lab_queue_id.exists' => 'The :attribute must be an existing lab queue.',
        ];
    }
}

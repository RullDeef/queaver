<?php

namespace App\Http\Requests;

use App\Models\LabQueue;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreLabQueueRequest extends FormRequest
{
    protected $redirect = 'nope';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', LabQueue::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'semester' => ['required', 'integer', 'min:1', 'max:8'],
            'labs_count' => ['required', 'integer', 'min:1', 'max:255'],
            'priority_policy' => ['required', 'integer', 'min:1', 'max:4'], ///TODO: 4 - magic constant (replace)
            // 'group_index_indifference' => ['required'], // false if not set
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Gate::allows('task_access');
    }

    public function rules(): array
    {
        return [
            'description' => [
                'required', 'string',
            ]
        ];
    }
}

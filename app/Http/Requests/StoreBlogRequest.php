<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('blog_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [		
            'title'     => [
                'string',
                'required',
            ],
            'content'    => [
                'string',
                'required',
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
}

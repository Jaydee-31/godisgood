<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Gate::allows('user_access');
    }
    
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'email', 'max:255',
            //             'unique:users, email,' . request()->route('user')->id,
            // ],
            // 'name'    => [
            //     'string',
            //     'required',
            // ],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            // 'password' => [
            //     Password::min(8)
            // ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }
}

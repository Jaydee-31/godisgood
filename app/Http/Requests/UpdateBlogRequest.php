<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateBlogRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Gate::allows('task_access');
    }
    
    public function rules()
    {
        return [
            // 'title'     => [
            //     'string',
            //     'required',
            // ],
            'content'    => [
                'string',
                'required',
            ],
            // 'author_id' => [
            //     'required',
            // ],
        ];
    }
}

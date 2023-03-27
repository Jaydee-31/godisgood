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
        return Gate::allows('blog_access');
    }
    
    public function rules()
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // 'author_id' => [
            //     'required',
            // ],
        ];
    }
}

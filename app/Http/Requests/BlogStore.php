<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStore extends FormRequest
{

    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'blog' => 'array|min:1',
            'blog.*' => 'required',
            'blog.*.title'=> 'required|max:50|min:3',
            'blog.*.content'=> 'required|min:3',
            'image'=> 'mimes:jpg,jpeg,png',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:20',
            'subject'=>'required',
            'phone'=>'required|string|max:20',
            'message'=>'required|string',
        ];
    }
}

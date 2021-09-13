<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'service' => 'array|min:1',
            'service.*' => 'required',
            'service.*.name'=> 'required|max:50|min:3',
            'service.*.description'=> 'required|min:10',
            'image'=> 'mimes:jpg,jpeg,png',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => 'required',
            "body" => 'required',
            "tags" => 'json',
        ];

    }

    public function messages()
    {
        return [
            "title.required" => 'enter title',
            "body.required" => 'enter body',
            "tags.json" => 'must be a json',
        ];
    }
}

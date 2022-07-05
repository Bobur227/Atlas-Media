<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            /*"name" =>'required',
            "email" =>'required',*/
            "submit" =>'required|max:50',
            "message" =>'required|min:15|max:500',
            "file" =>'required|mimes:png,jpeg,jpg,pdf'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Поле :attribute явялеся обязательным для заполнения',
        ];
    }
}

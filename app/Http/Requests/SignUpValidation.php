<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpValidation extends FormRequest
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
            'fullName' => 'bail|required|string|min:4|max:30',
            'email'    => 'bail|required|email|max:100|unique:users,email',
            'username' => 'bail|required|string|min:5|max:15|unique:users,username',
            'password' => 'bail|required|string|min:8|max:20',
        ];
    }
}

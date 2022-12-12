<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'phone' => 'required',
            'name' => 'required',
            'rl' => 'required',
            'career'=>'nullable',
            'pet'=>'nullable',
            'guests' =>'nullable',
            'shareBelongings' =>'nullable',
            'smoker' =>'nullable',
            'passion' =>'nullable',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
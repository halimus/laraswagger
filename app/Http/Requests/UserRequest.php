<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;  // Anyone can make this request right now
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|email|max:45|unique:users',
            'password' => 'required|min:4'
        ];
    }


}

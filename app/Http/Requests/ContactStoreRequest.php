<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|email',
            'mobile' => 'required',
            'message'=> 'required'
        ];
    }

    public function messages(){

        return[
            'firstname.required' => 'Firstname is required',
            'lastname.required' => 'Lastname is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email address is not valid',
            'message.required' => 'Message is required',
        ];
    }
}

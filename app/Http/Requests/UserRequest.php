<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nik' => [
                Rule::unique('users','nik')->ignore($this->user->nik ?? null, 'nik'),
                Rule::requiredIf($this->isMethod('post')),
            ],
            'name' => [
                'required'
            ],
            'email' => [
                Rule::requiredIf($this->isMethod('post')),
                'email',
                'string',
                Rule::unique('users','email')->ignore($this->user->email ?? null, 'email')
            ],
            'password' => [
                Rule::requiredIf($this->isMethod('post')),
            ],
            'department' => [
                'required',
                'exists:departments,id'
            ],
            'signature' => [
                Rule::requiredIf($this->isMethod('post')),
                'max:3024',
                'mimes:jpeg,jpg,png,webp'
            ],
            'avatar' => [
                Rule::requiredIf($this->isMethod('post')),
                'max:3024',
                'mimes:jpeg,jpg,png,webp'
            ],
        ];
    }
}

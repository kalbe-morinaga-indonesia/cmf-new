<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DivisiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'txtIdDivisi' => [
                'required',
                'max:8',
                Rule::unique('divisis')->ignore($this->divisi),
            ],
            'txtNamaDivisi' => [
                'required',
            ]
        ];
    }
}

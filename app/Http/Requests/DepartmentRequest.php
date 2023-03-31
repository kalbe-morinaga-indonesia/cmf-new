<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'txtIdDept' => [
                'required',
                Rule::unique('departments')->ignore($this->department)
            ],
            'txtNamaDept' => [
                'required'
            ],
            'divisi_id' => [
                'required'
            ]
        ];
    }
}

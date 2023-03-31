<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubdepartmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'txtIdSubDept' => [
                'required',
                Rule::unique('subdepartments')->ignore($this->subdepartment)
            ],
            'txtNamaSubDept' => [
                'required'
            ],
            'department_id' => [
                'required'
            ]
        ];
    }
}

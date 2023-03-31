<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmfRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'no_cmf' => 'required',
            'judul_perubahan' => 'required',
            'perubahan' => 'required',
            'tanggal' => 'required',
            'jenis_perubahan' => 'required',
            'target_implementasi' => 'required',
            'tipe_perubahan' => 'required',
            'alasan_perubahan' => 'required',
            'dampak_terhadap_perubahan' => 'required',
            'deskripsi_perubahan' => 'required',
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    public function run(): void
    {
        Divisi::create([
            'txtIdDivisi' => 'DVI-0001',
            'txtNamaDivisi' => 'Manufacturing'
        ]);
        Divisi::create([
            'txtIdDivisi' => 'DVI-0002',
            'txtNamaDivisi' => 'Suporting'
        ]);
        Divisi::create([
            'txtIdDivisi' => 'DVI-0003',
            'txtNamaDivisi' => 'BOD'
        ]);
        Divisi::create([
            'txtIdDivisi' => 'DVI-0004',
            'txtNamaDivisi' => 'Klinik'
        ]);
        Divisi::create([
            'txtIdDivisi' => 'DVI-0005',
            'txtNamaDivisi' => 'PKL'
        ]);
        Divisi::create([
            'txtIdDivisi' => 'DVI-0006',
            'txtNamaDivisi' => 'Serikat'
        ]);
    }
}

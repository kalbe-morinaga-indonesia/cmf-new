<?php

namespace Database\Seeders;

use App\Models\Subdepartment;
use Illuminate\Database\Seeder;

class SubdepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0001',
            'txtNamaSubDept' => 'PRD-PD',
            'department_id' => 4
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0002',
            'txtNamaSubDept' => 'PRD-FP',
            'department_id' => 4
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0003',
            'txtNamaSubDept' => 'HC-RT',
            'department_id' => 8
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0004',
            'txtNamaSubDept' => 'HC-GA',
            'department_id' => 8
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0005',
            'txtNamaSubDept' => 'HC-PR',
            'department_id' => 8
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0006',
            'txtNamaSubDept' => 'QAC-IL',
            'department_id' => 7
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0007',
            'txtNamaSubDept' => 'QAC-MC',
            'department_id' => 7
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0008',
            'txtNamaSubDept' => 'BDA-PU',
            'department_id' => 3
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0009',
            'txtNamaSubDept' => 'BDA-FA',
            'department_id' => 3
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0010',
            'txtNamaSubDept' => 'MDP-IT',
            'department_id' => 9
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0011',
            'txtNamaSubDept' => 'MDP-PPIC',
            'department_id' => 9
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0012',
            'txtNamaSubDept' => 'MDP-PR',
            'department_id' => 9
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0013',
            'txtNamaSubDept' => 'ENG',
            'department_id' => 5
        ]);
        Subdepartment::create([
            'txtIdSubDept' => 'SDP-0014',
            'txtNamaSubDept' => 'WHS',
            'department_id' => 6
        ]);
    }
}

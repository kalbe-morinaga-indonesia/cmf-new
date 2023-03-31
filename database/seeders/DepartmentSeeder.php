<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'txtIdDept' => "DPN-0001",
            'divisi_id' => 1,
            'txtNamaDept' => "MNF",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0002",
            'divisi_id' => 1,
            'txtNamaDept' => "IOS",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0003",
            'divisi_id' => 2,
            'txtNamaDept' => "BDA",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0004",
            'divisi_id' => 1,
            'txtNamaDept' => "PRD",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0005",
            'divisi_id' => 1,
            'txtNamaDept' => "ENG",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0006",
            'divisi_id' => 1,
            'txtNamaDept' => "WHS",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0007",
            'divisi_id' => 1,
            'txtNamaDept' => "QA",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0008",
            'divisi_id' => 2,
            'txtNamaDept' => "HC",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0009",
            'divisi_id' => 1,
            'txtNamaDept' => "MDP",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0010",
            'divisi_id' => 3,
            'txtNamaDept' => "BOD",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0011",
            'divisi_id' => 1,
            'txtNamaDept' => "RESIGN",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0012",
            'divisi_id' => 4,
            'txtNamaDept' => "KLINIK",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0013",
            'divisi_id' => 5,
            'txtNamaDept' => "PKL",
        ]);
        Department::create([
            'txtIdDept' => "DPN-0014",
            'divisi_id' => 6,
            'txtNamaDept' => "SERIKAT",
        ]);
    }
}

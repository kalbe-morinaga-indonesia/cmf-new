<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pic']);
        Role::create(['name' => 'depthead pic']);
        Role::create(['name' => 'depthead']);
        Role::create(['name' => 'svp system']);
        Role::create(['name' => 'mnf']);
        Role::create(['name' => 'mr & food safety team']);
        Role::create(['name' => 'document control']);
    }
}

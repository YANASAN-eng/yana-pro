<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = new Department();

        $department->create([
            'name' => '数学',
            'url' => 'math'
        ]);
        $department->create([
            'name' => '物理学',
            'url' => 'physics'
        ]);
        $department->create([
            'name' => '情報工学',
            'url' => 'information'
        ]);
        $department->create([
            'name' => '創作',
            'url' => 'create'
        ]);
        $department->create([
            'name' => '作曲',
            'url' => 'music'
        ]);
    }
}

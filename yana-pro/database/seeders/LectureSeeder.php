<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lecture;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecture = new Lecture();

        $lecture->create([
            'department_id' => 3,
            'name' => '機械学習',
            'url' => 'machine'
        ]);
    }
}

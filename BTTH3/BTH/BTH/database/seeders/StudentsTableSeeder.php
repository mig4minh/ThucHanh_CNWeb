<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '2015-09-15',
                'parent_phone' => '0987654321',
                'class_id' => 1, // Tham chiếu lớp Pre-K
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '2016-05-21',
                'parent_phone' => '0123456789',
                'class_id' => 2, // Tham chiếu lớp Kindergarten
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

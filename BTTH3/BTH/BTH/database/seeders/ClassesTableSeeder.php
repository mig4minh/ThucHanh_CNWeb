<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('classes')->insert([
            ['grade_level' => 'Pre-K', 'room_number' => 'VH7', 'created_at' => now(), 'updated_at' => now()],
            ['grade_level' => 'Kindergarten', 'room_number' => 'VH8', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

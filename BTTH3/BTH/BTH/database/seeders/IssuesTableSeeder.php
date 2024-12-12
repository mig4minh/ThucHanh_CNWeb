<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1, // Tham chiếu đến Lab1-PC01
                'reported_by' => 'Admin',
                'reported_date' => now(),
                'description' => 'The computer is not starting up.',
                'urgency' => 'High',
                'status' => 'Open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_id' => 2, // Tham chiếu đến Lab1-PC02
                'reported_by' => 'User1',
                'reported_date' => now(),
                'description' => 'Blue screen error during boot.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

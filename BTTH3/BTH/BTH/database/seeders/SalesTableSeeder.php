<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1, // Tham chiếu đến thuốc Paracetamol
                'quantity' => 5,
                'sale_date' => now(),
                'customer_phone' => '0333333333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 2, // Tham chiếu đến thuốc Amoxicillin
                'quantity' => 2,
                'sale_date' => now(),
                'customer_phone' => '0333333331',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

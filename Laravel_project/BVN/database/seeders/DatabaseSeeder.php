<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PharIo\Manifest\Library;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Gọi các Seeder để chèn dữ liệu
        $this->call([
            LibrariesTableSeeder::class,
            BooksTableSeeder::class,
        ]);
    }
}
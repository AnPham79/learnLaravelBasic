<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\sinhvien;
use App\Enums\trangthaisinhvienEnum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(10)->create();
        sinhvien::factory(500)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array(
                'name' => 'Comedor',
                'description' => 'Decoración de comedor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Dormitorio',
                'description' => 'Decoración de dormitorio',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Cocina',
                'description' => 'Menaje de cocina',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Baño',
                'description' => 'Menaje de baño',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),  
        ];

        DB::table('categories')->insert($datos);
    }
}

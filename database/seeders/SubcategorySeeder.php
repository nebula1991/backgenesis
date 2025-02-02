<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array(
                'name' => 'Mesas',
                'description' => 'Mesas de comedor',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sillas',
                'description' => 'Sillas de comedor',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sofas',
                'description' => 'Sofas de salón',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Cómodas',
                'description' => 'Decoración de dormitorio',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Armarios',
                'description' => 'Decoración de dormitorio',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Mesitas de noche',
                'description' => 'Decoración de dormitorio',
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sartenes',
                'description' => 'Menaje de cocina',
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Ollas',
                'description' => 'Menaje de cocina',
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Cafeteras',
                'description' => 'Menaje de cocina',
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Espejos',
                'description' => 'Menaje de baño',
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),  
            array(
                'name' => 'Toallas',
                'description' => 'Menaje de baño',
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),  
            array(
                'name' => 'Muebles de baño',
                'description' => 'Menaje de baño',
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),  
        ];

        DB::table('subcategories')->insert($datos);
    }
}

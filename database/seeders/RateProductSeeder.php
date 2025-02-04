<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array(
                'product_id' => 1,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 110,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 2,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 100,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 3,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 150,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 4,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 50,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 5,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 649.90,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 6,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 349.99,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 7,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 205,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 8,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 650,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 9,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 205,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 10,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 40,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 11,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 70.90,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 12,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 40,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 13,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 179.99,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 14,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 15.90,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'product_id' => 15,
                'name' => 'Rebajas  Invierno',
                'price_rate' => 299.99,
                'start_date' => '2025-01-07',
                'end_date'  => '2025-03-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            
        ];
        
        DB::table('rate_products')->insert($datos);
    }
}

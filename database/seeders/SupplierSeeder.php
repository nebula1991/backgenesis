<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            array(
                'name' => 'Logistics SA',
                'email' => 'logistics@correo.com',
                'address' => 'calle falsa 1, 13',
                'phone' => '652325689',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Distribuciones SA',
                'email' => 'distribuciones@correo.com',
                'address' => 'calle falsa 5, 20',
                'phone' => '682325678',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Mayorista SA',
                'email' => 'mayorista@correo.com',
                'address' => 'calle falsa 9, 20',
                'phone' => '682545698',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Home SL',
                'email' => 'home@correo.com',
                'address' => 'calle falsa 2, 15',
                'phone' => '652345857',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
           
        
        ];

        DB::table('suppliers')->insert($datos);
    }
}

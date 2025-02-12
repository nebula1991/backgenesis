<?php

namespace Database\Seeders;


use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
 
    {

        $datos = [
            array(
                'name' => 'Mesa Redonda',
                'description' => 'Mesa de comedor',
                'price' => 150,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Mesa Rectangular',
                'description' => 'Mesa de comedor',
                'price' => 149.99,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Mesa Extensible',
                'description' => 'Mesa de comedor',
                'price' => 149.99,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Silla de Madera',
                'description' => 'Silla de comedor',
                'price' => 200,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Silla de Ratán',
                'description' => 'Silla de comedor',
                'price' => 80,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Silla de Metal',
                'description' => 'Silla de comedor',
                'price' => 80,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sofa modular',
                'description' => 'Sofá de comedor',
                'price' => 800,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sofá chaise longue',
                'description' => 'Sofá de comedor',
                'price' => 400,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sofá cama',
                'description' => 'Sofá de comedor',
                'price' => 400,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 1,
                'subcategory_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Madera',
                'description' => 'Cómoda de madera',
                'price' => 250,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 2,
                'subcategory_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Armario 1',
                'description' => 'Armario de madera',
                'price' => 900,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 2,
                'subcategory_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Mesita de noche 1',
                'description' => 'Mesita de madera',
                'price' => 249.99,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 2,
                'subcategory_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Sarten 1',
                'description' => 'Sarten inox',
                'price' => 49.50,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 3,
                'subcategory_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Olla 1',
                'description' => 'Olla inox',
                'price' => 89.99,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 3,
                'subcategory_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Cafetera 1',
                'description' => 'Bialleti',
                'price' => 50.50,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 3,
                'subcategory_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Espejo 1',
                'description' => 'Espejo Grande',
                'price' => 200,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 4,
                'subcategory_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Toalla Estampado',
                'description' => 'Algodón',
                'price' => 20.90,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 3,
                'subcategory_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name' => 'Armario de baño 1',
                'description' => 'Madera',
                'price' => 300,
                'stock' => 100,
                'image' => 'images/products/1738451209_1-54558547.jpg',
                'category_id'  => 3,
                'subcategory_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];
    
        DB::table('products')->insert($datos);

    }
}

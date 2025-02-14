<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\RateProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RateProductSeeder::class);
        $this->call(class: SupplierSeeder::class);
        $this->call(class: RoleSeeder::class);
        $this->call(class: PermissionSeeder::class);
        $this->call(UserSeeder::class);

        
       
    }
}

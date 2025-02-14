<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      

        $user = User::create([
            'name' => 'StudioGenesis',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $role = Role::find(1);

        $permissions = Permission::pluck('id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role]);


        User::factory(10)->create();
        
    }
}

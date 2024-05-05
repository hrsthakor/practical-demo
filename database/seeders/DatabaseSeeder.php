<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    // public function run()
    // {
    //       // \App\Models\User::factory(10)->create();
    //     User::firstOrCreate(
    //         ['email' => 'admin@gmail.com'],
    //         [
    //             'first_name' => 'Admin',
    //             'last_name' => 'Test',
    //             'password' => Hash::make('Test@1234'),
    //             'role_id' => 1,
    //         ]
    //     );
    // }

    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}

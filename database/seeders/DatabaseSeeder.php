<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => "Admin BEM",
            'email' => 'adminbem@gmail.com',
            'password' => Hash::make('password'),
            'profil'=>'admin'
        ]);

        // \App\Models\User::factory(1)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => "Admin BEM",
        //     'email' => "bemadmin@gmail.com",
        //     'email_verified_at' => "bemadmin@gmail.com",
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'profil' => 'admin',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Laila Khusnul',
        //     'email' => 'admin@mail.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'admin',
        // ]);
        User::created([
            'name' => 'Laila Khusnul',
        'email' => 'admin@mail.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
        ]);
    }
}

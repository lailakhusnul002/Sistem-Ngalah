<?php

namespace Database\Seeders;

use App\Models\Asrama;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Laila Khusnul',
        'email' => 'admin@mail.com',
        'password' => bcrypt('password'),
        'role' => 'superadmin',
        ]);

        Student::create([
            'nama' => 'Ali Bisri',
            'jeniskelamin' => 'lelaki',
            'alamat' => 'Sukorejo',
            'notelpon' => '085732123456',
            'foto' => 'default.jpg',
            'id_asramas' => '1',
            'tanggal_lahir' => '2009/2/22',
        ]);
        Asrama::create([
            'nama' => 'Asrama A'
        ]);
    }
}

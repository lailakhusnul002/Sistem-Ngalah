<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nama' => 'Laila Khusnul',
            'idyayasan' => '4389327443001',
            'jeniskelamin' => 'perempuan',
            'alamat' => 'Mojokerto',
            'notelpon' => '0895606976016',
        ]);

        
    }
}

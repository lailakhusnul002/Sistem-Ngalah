<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViolationaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('violationas')->insert([
            'nama' => 'Laila Khusnul',
            'idyayasan' => '4389327443001',
            'jeniskelamin' => 'perempuan',
            'pelanggaran' => 'Tidak Piket',
            'jenispelanggaran' => 'ringan',
            'hukuman' => 'Membersihkan Toilet',
            'alamat' => 'Mojokerto',
            'notelpon' => '0895606976016',
        ]);

        
    }
}

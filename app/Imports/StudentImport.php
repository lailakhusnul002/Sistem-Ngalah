<?php

namespace App\Imports;

use App\Models\Murid;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nama' => $row[1],
            'idyayasan' => $row[2],
            'jeniskelamin' => $row[3],
            'alamat' => $row[4],
            'notelpon' => $row[5],
            'foto' => $row[6]
        ]);
    }
}

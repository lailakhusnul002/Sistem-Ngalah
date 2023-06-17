<?php

namespace App\Imports;


use App\Models\Violationa;
use Maatwebsite\Excel\Concerns\ToModel;

class ViolationaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Violationa([
            'nama' => $row[1],
            'idyayasan' => $row[2],
            'jeniskelamin' => $row[3],
            'pelanggaran' => $row[4],
            'jenispelanggaran' => $row[5],
            'hukuman' => $row[6],
            'notelpon' => $row[7],
            'foto' => $row[8]
        ]);
    }
}

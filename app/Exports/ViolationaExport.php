<?php

namespace App\Exports;

use App\Models\Violationa;
use Maatwebsite\Excel\Concerns\FromCollection;

class ViolationaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Violationa::all();
    }
}

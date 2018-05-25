<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Technology;

class TechMatrixExport implements FromCollection
{
	public function collection()
    {
        return Technology::all();
    }
}

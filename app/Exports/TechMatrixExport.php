<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class TechMatrixExport implements WithMultipleSheets
{


	public function sheets(): array
    {
        $sheets = [];

        
			$sheets[] = new TechnologiesSheet();
			$sheets[] = new CostsSheet();
			$sheets[] = new NotesSheet();
			$sheets[] = new InputsSheet();


        return $sheets;
    }

	
}

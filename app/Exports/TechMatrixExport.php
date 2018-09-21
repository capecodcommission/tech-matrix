<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class TechMatrixExport implements WithMultipleSheets
{

	use Exportable;
	
	public function sheets(): array
    {
		
        $sheets = [];

        
			$sheets[] = new TechnologiesSheet();
			$sheets[] = new NotesSheet();
			$sheets[] = new InputsSheet();
			$sheets[] = new ReferencesSheet();

        return $sheets;
    }

	
}

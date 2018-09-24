<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class TechMatrixExport implements WithMultipleSheets
{
	use Exportable;

	public function registerEvents(): array
	{
		return [
		// Handle by a closure.
		// BeforeExport::class => function(BeforeExport $event) {
		// 	$event->writer->getProperties()->setCreator('You')->setTitle("Title");
		// },
		BeforeWriting::class => function(BeforeWriting $event) {
			$event->writer->setActiveSheetIndex(0);
		},
		];
	}

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

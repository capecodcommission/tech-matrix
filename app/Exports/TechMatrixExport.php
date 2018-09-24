<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;

class TechMatrixExport implements WithMultipleSheets, WithEvents
{
  use Exportable, RegistersEventListeners;

	public function registerEvents(): array
	{
		return [
		// Handle by a closure.
		BeforeExport::class => function(BeforeExport $event) {
			$event->writer->getProperties()->setCreator('Cape Cod Commission')->setTitle("Tech Matrix");
		},
		BeforeWriting::class => function(BeforeWriting $event) {
			$event->writer->setActiveSheetIndex(2);
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

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use App\Models\Note;

use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class NotesSheet implements FromView, WithEvents
{

	public function view(): View
	{
		return view('export.notes', [
			'list' => Note::withTrashed()->get()
		]);
	}

	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('B3:B200')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('B')->setWidth(100);
			},
		];
	}
}

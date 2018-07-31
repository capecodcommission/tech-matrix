<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use App\Models\Technology;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Helper\Html;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;



class ReferencesSheet implements FromView, WithEvents
{

	public function view(): View
	{
		$list = Technology::all()->sortBy('technology_id');
			
		return view('export.references', [
			'list' => $list
		]);

	}


	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('A2:C78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(40);
				$event->sheet->getColumnDimension('C')->setWidth(90);
				$event->sheet->styleCells('A1:C2', ['font' => ['bold'=>true]]);
			},
		];
	}
}

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
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;



class TechnologiesSheet implements FromView, WithEvents
{

	public function view(): View
	{
		
		return view('export.technologies', [
			'list' => Technology::all()->sortBy('technology_id')
		]);

			// 'list' => Technology::all()->sortBy('technology_id')
	}


	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('R3:R78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('Q3:Q78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('C3:C78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('E3:I78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('W3:AF78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(70);
				$event->sheet->getColumnDimension('B')->setWidth(90);
				$event->sheet->getColumnDimension('D')->setWidth(90);
				$event->sheet->getColumnDimension('E')->setWidth(22);
				$event->sheet->getColumnDimension('F')->setWidth(20);
				$event->sheet->getColumnDimension('G')->setWidth(30);
				$event->sheet->getColumnDimension('H')->setWidth(30);
				$event->sheet->getColumnDimension('I')->setWidth(30);
				$event->sheet->getColumnDimension('K')->setWidth(15);
				$event->sheet->getColumnDimension('W')->setWidth(40);
				$event->sheet->getColumnDimension('X')->setWidth(60);
				$event->sheet->getColumnDimension('Y')->setWidth(60);
				$event->sheet->getColumnDimension('Z')->setWidth(40);
				$event->sheet->getColumnDimension('AA')->setWidth(40);
				$event->sheet->getColumnDimension('AB')->setWidth(40);
				$event->sheet->getColumnDimension('AC')->setWidth(40);
				$event->sheet->getColumnDimension('AD')->setWidth(40);
				$event->sheet->getColumnDimension('AE')->setWidth(40);
				$event->sheet->getColumnDimension('AF')->setWidth(40);

				$event->sheet->getStyle('O3:S78')->getNumberFormat()->setFormatCode('$#,##0');
				$event->sheet->getStyle('K3:M78')->getNumberFormat()->setFormatCode('$#,##0');
				$event->sheet->getStyle('V3:V78')->getNumberFormat()->setFormatCode('$#,##0');

				// add formulas to cells
				
				$event->sheet->setCellValue('AF5','=K5*0.4536');
				$event->sheet->freezePane('C3');

				// $event->sheet->styleCells(
				//     'B2:G8',
				//     [
				//         'borders' => [
				//             'outline' => [
				//                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				//                 'color' => ['argb' => 'FFFF0000'],
				//             ],
				//         ]
				//     ]
				// );
			},
		];
	}
}

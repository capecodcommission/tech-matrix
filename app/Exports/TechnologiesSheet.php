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
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;



class TechnologiesSheet implements FromView, WithEvents
{

	public function view(): View
	{
		$list = Technology::with(['siting_requirements','system_design_considerations', 'permitting_agencies'])->get()->sortBy('technology_id');
			
		return view('export.technologies', [
			'list' => $list
		]);

			// 'list' => Technology::all()->sortBy('technology_id')
	}


	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('A2:AY2')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('B3:B78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('R3:R78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('Q3:Q78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('D3:D78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('E3:I78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('W3:AF78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('AV3:BF78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('BG3:BL78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(40);
				$event->sheet->getColumnDimension('B')->setWidth(45);
				$event->sheet->getColumnDimension('D')->setWidth(90);
				$event->sheet->getColumnDimension('E')->setWidth(22);
				$event->sheet->getColumnDimension('F')->setWidth(20);
				$event->sheet->getColumnDimension('G')->setWidth(20);
				$event->sheet->getColumnDimension('H')->setWidth(30);
				$event->sheet->getColumnDimension('I')->setWidth(30);
				$event->sheet->getColumnDimension('AV')->setWidth(40);
				$event->sheet->getColumnDimension('AW')->setWidth(40);
				$event->sheet->getColumnDimension('AX')->setWidth(40);
				$event->sheet->getColumnDimension('AY')->setWidth(40);
				$event->sheet->getColumnDimension('AZ')->setWidth(40);
				$event->sheet->getColumnDimension('BA')->setWidth(40);
				$event->sheet->getColumnDimension('BB')->setWidth(40);
				$event->sheet->getColumnDimension('BC')->setWidth(40);
				$event->sheet->styleCells('A1:BP2', ['font' => ['bold'=>true]]);
				$event->sheet->getStyle('K1:P2')->getFill()
					->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
					->getStartColor()->setARGB('CECECECE');
				$event->sheet->getStyle('Q1:X2')->getFill()
					->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
					->getStartColor()->setARGB('FFC6E0B4');

			/* This is for the icon -> it needs a background color since the svg is white 	
				$event->sheet->getStyle('D3:D77')->getFill()
					->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
					->getStartColor()->setARGB('FF52a9df');
			*/
					
	
				// $event->sheet->getStyle('O3:S78')->getNumberFormat()->setFormatCode('$#,##0');
				// $event->sheet->getStyle('K3:M78')->getNumberFormat()->setFormatCode('$#,##0');
				// $event->sheet->getStyle('V3:V78')->getNumberFormat()->setFormatCode('$#,##0');

				$event->sheet->mergeCells('K1:P1');
				$event->sheet->mergeCells('Q1:V1');
				$event->sheet->mergeCells('W1:X1');

				$event->sheet->styleCells(
				'W1:W2',
				[
					'borders' => [
						'left' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					]
				]
			);
				
				// add formulas to cells
				// $event->sheet->setCellValue('AF5','=K5*0.4536');

				$event->sheet->freezePane('C3');

			},
		];
	}
}

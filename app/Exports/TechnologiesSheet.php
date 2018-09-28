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



class TechnologiesSheet implements FromView, WithColumnFormatting, WithEvents
{

	public function view(): View
	{
		$list = Technology::with(['siting_requirements','system_design_considerations', 'considerations', 'time_to_improve_estuary', 'permitting_agencies', 'years_of_evaluation_monitoring', 'influent_concentrations'])->get()->sortBy('technology_id');
			
		return view('export.technologies', [
			'list' => $list
		]);

			// 'list' => Technology::all()->sortBy('technology_id')
	}

 public function columnFormats(): array
    {
        return [
            // 'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
			'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
			'P' => NumberFormat::FORMAT_PERCENTAGE,
			'Q' => NumberFormat::FORMAT_PERCENTAGE,
			'R' => NumberFormat::FORMAT_PERCENTAGE,
			'S' => NumberFormat::FORMAT_PERCENTAGE,
			'T' => NumberFormat::FORMAT_PERCENTAGE,
			'U' => NumberFormat::FORMAT_PERCENTAGE,
			'AO' => NumberFormat::FORMAT_PERCENTAGE,
			'AG' => NumberFormat::FORMAT_PERCENTAGE,
			'AJ' => NumberFormat::FORMAT_CURRENCY_USD,
			'AK' => NumberFormat::FORMAT_CURRENCY_USD,			
        ];
    }


	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('A2:BU2')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('B3:B78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('J3:J78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('K3:K78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('L3:L78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('R3:R78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('Q3:Q78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('D3:D78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('E3:I78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('W3:AF78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('AV3:BL78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('BM3:BM78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('BP3:BP78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(40);
				$event->sheet->getColumnDimension('B')->setWidth(45);
				$event->sheet->getColumnDimension('C')->setWidth(11);
				$event->sheet->getColumnDimension('D')->setWidth(30);
				$event->sheet->getColumnDimension('E')->setWidth(60);
				$event->sheet->getColumnDimension('F')->setWidth(20);
				$event->sheet->getColumnDimension('G')->setWidth(20);
				$event->sheet->getColumnDimension('K')->setWidth(30);
				$event->sheet->getColumnDimension('L')->setWidth(30);
				$event->sheet->getColumnDimension('BG')->setWidth(40);
				$event->sheet->getColumnDimension('BH')->setWidth(40);
				$event->sheet->getColumnDimension('BI')->setWidth(40);
				$event->sheet->getColumnDimension('BJ')->setWidth(40);
				$event->sheet->getColumnDimension('BK')->setWidth(40);
				$event->sheet->getColumnDimension('BL')->setWidth(40);
				$event->sheet->getColumnDimension('BM')->setWidth(30);
				$event->sheet->getColumnDimension('BN')->setWidth(15);
				$event->sheet->getColumnDimension('BO')->setWidth(20);
				$event->sheet->getColumnDimension('BP')->setWidth(30);
				$event->sheet->getColumnDimension('BQ')->setWidth(15);
				$event->sheet->getColumnDimension('BR')->setWidth(15);
				$event->sheet->getColumnDimension('BU')->setWidth(10);
				$event->sheet->styleCells('A1:BU2', ['font' => ['bold'=>true]]);
				$event->sheet->getStyle('P1:U2')->getFill()
					->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
					->getStartColor()->setARGB('CECECECE');
				$event->sheet->getStyle('V1:AA2')->getFill()
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
				// $event->sheet->getStyle('AO3:AO78')->getNumberFormat()->setFormatCode('#%');
				// $event->sheet->getStyle('AG3:AG78')->getNumberFormat()->setFormatCode('#%');
				$event->sheet->mergeCells('P1:U1');
				$event->sheet->mergeCells('V1:AA1');
				$event->sheet->mergeCells('AB1:AC1');

				$event->sheet->styleCells(
				'AD1:AD2',
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

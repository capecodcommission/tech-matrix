<?php

namespace App\Exports;

use App\Models\Technology;
use Illuminate\Contracts\View\View;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Helper\Html;




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
			'O' => NumberFormat::FORMAT_NUMBER,
			'P' => NumberFormat::FORMAT_PERCENTAGE,
			'Q' => NumberFormat::FORMAT_PERCENTAGE,
			'R' => NumberFormat::FORMAT_PERCENTAGE,
			'S' => NumberFormat::FORMAT_PERCENTAGE,
			'T' => NumberFormat::FORMAT_PERCENTAGE,
			'U' => NumberFormat::FORMAT_PERCENTAGE,
			'AD' => NumberFormat::FORMAT_CURRENCY_USD,
			'AE' => NumberFormat::FORMAT_CURRENCY_USD,
			'AG' => NumberFormat::FORMAT_PERCENTAGE,
			'AH' => NumberFormat::FORMAT_CURRENCY_USD,
			'AI' => NumberFormat::FORMAT_CURRENCY_USD,
			'AJ' => NumberFormat::FORMAT_CURRENCY_USD,
			'AK' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AL' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AM' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AN' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AO' => NumberFormat::FORMAT_PERCENTAGE,
			'AR' => NumberFormat::FORMAT_CURRENCY_USD,			
			'AS' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AT' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AU' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AV' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AW' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AY' => NumberFormat::FORMAT_CURRENCY_USD,	
			'AZ' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BA' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BB' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BC' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BD' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BE' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BF' => NumberFormat::FORMAT_CURRENCY_USD,	
			'BG' => NumberFormat::FORMAT_CURRENCY_USD,	           
			'BV' => NumberFormat::FORMAT_DATE_DDMMYYYY,

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
				$event->sheet->getColumnDimension('J')->setWidth(10);
				$event->sheet->getColumnDimension('K')->setWidth(30);
				$event->sheet->getColumnDimension('L')->setWidth(30);
				$event->sheet->getColumnDimension('BG')->setWidth(16);
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
				$event->sheet->styleCells('A1:BV2', ['font' => ['bold'=>true]]);
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

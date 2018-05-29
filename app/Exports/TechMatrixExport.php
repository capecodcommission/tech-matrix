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
// use App\Models\EcoSystemService;
// use App\Models\EvaluationMonitoring;
// use App\Models\InfluentConcentration;
// use App\Models\InfluentSource;
// use App\Models\Input;
// use App\Models\InputGroup;
// use App\Models\PermittingAgency;
// use App\Models\PilotingStatus;
// use App\Models\Pollutant;
// use App\Models\SitingRequirement;
// use App\Models\SystemDesignConsideration;
// use App\Models\TechnologyType;
// use App\Models\UnitMetric;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;



class TechMatrixExport implements FromView, WithColumnFormatting, WithEvents
{
	// public function collection()
	// {
	//     return Technology::all();
	// }
	public function view(): View
	{
		return view('export.download', [
			'list' => Technology::all()
		]);
	}

	public function columnFormats(): array
	{
		return [
			// 'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
			// 'P' => setWrapText::true;

		];
	}
	public function registerEvents(): array
	{
		return [
			AfterSheet::class => function(AfterSheet $event) {
				$event->sheet->getStyle('R3:R78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('Q3:Q78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('C3:C78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('D3:D78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('F3:G78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(70);
				$event->sheet->getColumnDimension('C')->setWidth(90);
				$event->sheet->getColumnDimension('D')->setWidth(40);
				$event->sheet->getColumnDimension('F')->setWidth(20);
				$event->sheet->getColumnDimension('G')->setWidth(30);
				$event->sheet->getColumnDimension('Q')->setWidth(90);
				$event->sheet->getColumnDimension('R')->setWidth(90);
				$event->sheet->getStyle('E3:G78')->getNumberFormat()->setFormatCode('$#,##0');
				$event->sheet->getStyle('I3:K78')->getNumberFormat()->setFormatCode('$#,##0');

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

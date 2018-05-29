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
				$event->sheet->getStyle('P3:P78')->getAlignment()->setWrapText(true);
				$event->sheet->getStyle('C3:C78')->getAlignment()->setWrapText(true);
				$event->sheet->getColumnDimension('A')->setWidth(90);
				$event->sheet->getColumnDimension('C')->setWidth(90);
				$event->sheet->getColumnDimension('P')->setWidth(90);
				$event->sheet->getStyle('D3:F78')->getNumberFormat()->setFormatCode('$#,##0');
				$event->sheet->getStyle('H3:J78')->getNumberFormat()->setFormatCode('$#,##0');

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

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
use App\Models\Input;
use App\Models\Note;
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
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;



class TechMatrixExport implements FromView, WithColumnFormatting, WithEvents, WithMultipleSheets
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
		// TODO: add a new sheet with all Notes

	}

	public function sheets(): array
    {
        $sheets = [];

        
        $sheets[] = view('export.technologies', [
			'list' => Technology::all()
		]);
		// $sheets[] = view('export.inputs', [
		// 	'list' => Input::all()
		// ]);
		$sheets[] = view('export.notes', [
			'list' => Input::all()
		]);
        

        return $sheets;
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

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



class CostsSheet implements FromView, WithEvents
{

	public function view(): View
	{
		$list = DB::select("
		 select t.*,
		n.n_removed_low, n.n_removed_high, n.n_removed_avg,
		np.n_kg_removed as n_removed_planning_period,
		p.p_removed_low, p.p_removed_high, p.p_removed_avg,
		pp.p_kg_removed as p_removed_planning_period,
		pc.adj_project_cost_low,
		pc.adj_project_cost_high,
		pc.adj_project_cost_avg,
		pc.replacement_cost,
		pc.total_replacement_cost,
		pc.project_cost_pv
		from technologies t 
		left outer join N_Removed_Per_Year() n on t.id = n.id
		left outer join P_removed_per_year() p on t.id = p.id
		left outer join N_Reduction_Per_Planning_Period() np on t.id = np.id
		left outer join P_Reduction_Per_planning_period() pp on t.id = pp.id
		left outer join Project_Costs() pc on t.id = pc.id 
			 ");
		return view('export.costs', [
			'list' => $list
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

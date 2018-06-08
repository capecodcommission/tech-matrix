<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\User;
use App\Models\TechnologyType;
use App\Models\SystemDesignConsideration;
use App\Models\Pollutant;
use App\Models\InfluentSource;
use App\Models\InfluentConcentration;
use App\Models\SitingRequirement;
use App\Models\PermittingAgency;
use App\Models\UnitMetric;
use App\Models\EcosystemService;
use App\Models\EvaluationMonitoring;
use App\Models\OMMonitoring;
use App\Models\PilotingStatus;
use App\Models\YearGrouping;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TechMatrixExport;


class ExportController extends Controller
{
	public function __construct(\Maatwebsite\Excel\Excel $excel)
{
    $this->excel = $excel;
}

	public function exportAll() 
	{
		
		return Excel::download(new TechMatrixExport, 'tech_matrix.xlsx');


	}
	
	public function export()
	{
		$list = Technology::all();
		$data = (object)[];
		$timestamp = date('Y-m-d_H-i');
		$filename = 'TechMatrix_' . $timestamp;

		$data->list = $list;
		$data->timestamp = $timestamp;

		$file = Excel::download($filename, function($excel) use($data) 
		{
			$data->title = 'Tech Matrix v2.0';
			$excel->sheet($data->title, function($sheet) use($data){
			
				$sheet->setStyle(array(
					'font' => array(
						'name' => 'Helvetica',
						'size' => 12
					)
				));
				$sheet->loadView('export.download', array('data'=>$data));
								
			});
			// $data->unit_id = 1;
			// $data->title = 'Cost Per Kilogram';
			// $excel->sheet($data->title, function($sheet) use($data){
			// 	$sheet->setStyle(array(
			// 		'font' => array(
			// 			'name' => 'Helvetica',
			// 			'size' => 12
			// 		)
			// 	));
			// 	$sheet->loadView('downloads.commodity_export', array('data'=>$data));
			// 					$sheet->mergeCells('A1:F1');
			// });
			// $data->unit_id = 2;
			// $data->title = 'Cost Per Metric Ton';
			// $excel->sheet($data->title, function($sheet) use($data){
			// 	$sheet->setStyle(array(
			// 		'font' => array(
			// 			'name' => 'Helvetica',
			// 			'size' => 12
			// 		)
			// 	));
			// 	$sheet->loadView('downloads.commodity_export', array('data'=>$data));
			// 					$sheet->mergeCells('A1:F1');
			// });
			

		})->setActiveSheetIndex(0)->download('xls');
		return $file;
	}
}

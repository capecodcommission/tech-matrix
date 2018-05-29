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
use App\Models\EcoSystemService;
use App\Models\EvaluationMonitoring;
use App\Models\InfluentConcentration;
use App\Models\InfluentSource;
use App\Models\Input;
use App\Models\InputGroup;
use App\Models\PermittingAgency;
use App\Models\PilotingStatus;
use App\Models\Pollutant;
use App\Models\SitingRequirement;
use App\Models\SystemDesignConsideration;
use App\Models\TechnologyType;
use App\Models\UnitMetric;


class TechMatrixExport implements FromView
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
}

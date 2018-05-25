<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Technology;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

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

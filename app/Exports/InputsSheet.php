<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\Input;




class InputsSheet implements FromView, ShouldAutoSize
{

	public function view(): View
	{
		return view('export.inputs', [
			'list' => Input::all()
		]);
	}
}

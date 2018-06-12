<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormulaType extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_formula_types';


	public function formulas()
	{
		return $this->hasMany('App\Models\Formula');
	}
}

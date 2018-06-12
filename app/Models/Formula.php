<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formula extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_formulas';

	public function technologies()
	{
		return $this->belongsToMany('App\Models\Technology', 'rel_formulas_technologies', 'formula_id', 'technology_id')->withTimestamps();
	}

	public function formula_type()
	{
		return $this->belongsTo('App\Models\FormulaType');
	}
}

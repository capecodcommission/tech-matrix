<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UnitMetric extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_unit_metrics'; 
}

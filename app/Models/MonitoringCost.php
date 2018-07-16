<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MonitoringCost extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_estimated_monitoring_costs';
	
}
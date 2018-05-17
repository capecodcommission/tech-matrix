<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EvaluationMonitoring extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_evaluation_monitoring'; 
}

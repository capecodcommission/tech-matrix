<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OMMonitoring extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_longterm_o_m_monitoring'; 
		protected $touches = ['technology'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Input extends Model
{
	use SoftDeletes;
	protected $guarded =['id'];
	protected $table = 'lkp_inputs';

	public function input_group()
	{
		return $this->belongsTo('App\Models\InputGroup');
	}
}

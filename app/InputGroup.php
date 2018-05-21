<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InputGroup extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_input_groups';

	public function inputs()
	{
		return $this->hasMany('App\Models\Input');
	}
}

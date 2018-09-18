<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TreatmentType extends Model
{
	use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_treatment_types';

    public function technologies()
    {
        return $this->hasMany('App\Models\Technology');
	}
		protected $touches = ['technology'];

}

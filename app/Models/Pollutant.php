<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pollutant extends Model
{
	use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_pollutants_treated';

    public function technologies()
    {
        return $this->belongsToMany('App\Models\Technology', 'rel_pollutants_technologies', 'pollutant_id', 'technology_id', 'id');
	}
		protected $touches = ['technology'];

}

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
        return $this->belongsToMany('App\Models\Technology', 'rel_baseline_concentrations', 'pollutant_id', 'technology_id', 'id');
    }
}

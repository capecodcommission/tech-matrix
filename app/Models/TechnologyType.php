<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TechnologyType extends Model
{
	use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_technology_types';

    public function technologies()
    {
        return $this->hasMany('App\Models\Technology');
    }
}

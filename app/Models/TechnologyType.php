<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyType extends Model
{
    protected $guarded = ['id'];
    protected $table = 'lkp_technology_types';

    public function technologies()
    {
        return $this->hasMany('App\Models\Technology');
    }
}

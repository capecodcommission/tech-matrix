<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SystemDesignConsideration extends Model
{
	use SoftDeletes;
    protected $table = 'lkp_system_design_considerations';
	protected $touches = ['technology'];

    
}

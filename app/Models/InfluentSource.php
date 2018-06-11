<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InfluentSource extends Model
{
	use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_influent_sources';
	protected $touches = ['technology'];

    
}

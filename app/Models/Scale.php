<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scale extends Model
{
    use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'lkp_scales';
	protected $touches = ['technology'];
}

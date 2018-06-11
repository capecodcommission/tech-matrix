<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SitingRequirement extends Model
{
	use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_siting_requirements';
	protected $touches = ['technology'];

}

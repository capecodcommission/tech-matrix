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

	public function technologies()
	{
		return $this->belongsToMany('App\Models\Technology', 'rel_siting_requirements_technologies', 'siting_requirement_id', 'technology_id')->withTimestamps();
	}

}

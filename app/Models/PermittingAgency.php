<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PermittingAgency extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
	protected $table = 'lkp_permitting_agencies';
		protected $touches = ['technology'];

}

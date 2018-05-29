<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Note extends Model
{
	use SoftDeletes;
	protected $guarded = ['id'];
	protected $table = 'notes';

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}

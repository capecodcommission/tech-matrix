<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\MSServerTrait;

use Illuminate\Database\Eloquent\SoftDeletes;


class Technology extends Model
{
	// use SoftDeletes;
	protected $guarded = [
        'id'
	];
    protected $table = 'technologies';
    
    public function technology_type()
    {
        return $this->belongsTo('App\Models\TechnologyType');
    }

    public function system_design_considerations()
    {
        return $this->belongsTo('App\Models\SystemDesignConsideration'); // need to set up table, relationship needs table name, etc.
    }
	
}
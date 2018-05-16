<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\MSServerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pollutant;
use App\Models\SystemDesignConsideration;
use App\Models\InfluentSource;
use App\Models\TechnologyType;
use App\Models\PermittingAgency;
use App\Models\SitingRequirement;


class Technology extends Model
{
	use SoftDeletes;
	protected $guarded = [
        'id'
	];
    protected $table = 'technologies';
    
    public function technology_type()
    {
        return $this->belongsTo('TechnologyType');
    }

    public function system_design_considerations()
    {
        return $this->belongsTo('SystemDesignConsideration', 'rel_system_design_considerations', 'consideration_id', 'technology_id')->withTimestamps();
    }

    public function pollutants()
    {
        return $this->belongsToMany('Pollutant', 'rel_baseline_concentrations', 'pollutant_id', 'technology_id')->withPivot('concentration_mg_l')->withTimestamps();
    }
    
    public function influent_sources()
    {
        return $this->belongsToMany('InfluentSources', 'rel_influent_sources_technologies', 'influent_id', 'technology_id')->withPivot('influent_concentration_id')->withTimestamps();
    }

    public function permitting_agencies()
    {
        return $this->belongsToMany('PermittingAgency', 'rel_permitting_agencies_technologies', 'agency_id', 'technology_id')->withTimestamps();
    }

    public function siting_requirements()
    {
        return $this->belongsToMany('SitingRequirement', 'rel_siting_requirements_technologies', 'siting_requirement_id', 'technology_id')->withTimestamps();
    }
    
}
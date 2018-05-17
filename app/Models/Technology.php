<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\MSServerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;



class Technology extends Model
{
	use SoftDeletes;
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
        return $this->belongsTo('App\Models\SystemDesignConsideration', 'rel_system_design_considerations', 'technology_id', 'consideration_id')->withTimestamps();
    }

    public function pollutants()
    {
        return $this->belongsToMany('App\Models\Pollutant', 'rel_baseline_concentrations', 'technology_id', 'pollutant_id')->withPivot('concentration_mg_l')->withTimestamps();
    }
    
    public function influent_sources()
    {
        return $this->belongsToMany('App\Models\InfluentSource', 'rel_influent_sources_technologies', 'technology_id', 'influent_id')->withPivot('influent_concentration_id')->withTimestamps();
    }

    public function permitting_agencies()
    {
        return $this->belongsToMany('App\Models\PermittingAgency', 'rel_permitting_agencies_technologies', 'technology_id', 'agency_id')->withTimestamps();
    }

    public function siting_requirements()
    {
        return $this->belongsToMany('App\Models\SitingRequirement', 'rel_siting_requirements_technologies', 'technology_id', 'siting_requirement_id')->withTimestamps();
	}
	
	public function unit_metrics()
	{
		return $this->belongsTo('App\Models\UnitMetric');
	}

	public function nutrient_reductions()
    {
        return $this->belongsToMany('App\Models\Pollutant', 'rel_technology_nutrient_percent_removals', 'technology_id', 'pollutant_id')->withPivot('high_low', 'percent_reduction')->withTimestamps();
    }
    
}
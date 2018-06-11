<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsToMany('App\Models\SystemDesignConsideration', 'rel_system_design_considerations', 'technology_id', 'consideration_id')->withTimestamps();
    }

    public function pollutants()
    {
        return $this->belongsToMany('App\Models\Pollutant', 'rel_baseline_concentrations', 'technology_id', 'pollutant_id')->withPivot('influent_concentration_id')->withTimestamps();
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
	
	public function unit_metric()
	{
		return $this->belongsTo('App\Models\UnitMetric')->withDefault([
        'unit_metric' => '(N/A)',
    ]);
	}

	public function nutrient_reductions()
    {
        return $this->belongsToMany('App\Models\Pollutant', 'rel_technology_nutrient_percent_removals', 'technology_id', 'pollutant_id')->withPivot('high_low', 'percent_reduction')->withTimestamps();
    }

    public function ecosystem_services()
    {
        return $this->belongsToMany('App\Models\EcosystemService', 'rel_ecosystem_services_technologies', 'technology_id', 'ecosystem_service_id')->withTimestamps();
	}

	public function evaluation_monitoring()
    {
        return $this->belongsToMany('App\Models\EvaluationMonitoring', 'rel_evaluation_monitoring_technologies', 'technology_id', 'evaluation_monitoring_id')->withTimestamps();
	}
	public function longterm_monitoring()
    {
        return $this->belongsToMany('App\Models\EvaluationMonitoring', 'rel_longterm_o_m_monitoring_technologies', 'technology_id', 'longterm_o_m_monitoring_id')->withTimestamps();
	}

	public function piloting_status()
	{
		return $this->belongsTo('App\Models\PilotingStatus');
	}

	public function time_to_improve_estuary()
	{
		return $this->belongsToMany('App\Models\YearGrouping', 'rel_time_to_improve_estuary_technologies', 'technology_id', 'year_grouping_id')->withTimestamps();
	}

	public function years_of_evaluation_monitoring()
	{
		return $this->belongsToMany('App\Models\YearGrouping', 'rel_years_of_evaluation_monitoring_technologies', 'technology_id', 'year_grouping_id')->withTimestamps();
	}

	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	public function notes()
    {
        return $this->morphToMany('App\Models\Note', 'notable');
    }
}
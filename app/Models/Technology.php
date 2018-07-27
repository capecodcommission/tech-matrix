<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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
		return $this->belongsToMany('App\Models\Pollutant', 'rel_baseline_concentrations', 'technology_id', 'pollutant_id')->withPivot('baseline_concentration_id')->withTimestamps();
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

	public function evaluation_monitoring_cost()
	{
		return $this->belongsTo('App\Models\MonitoringCost');
	}

	public function longterm_monitoring_cost()
	{
		return $this->belongsTo('App\Models\MonitoringCost');
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
	
	public function formulas()
	{
		return $this->belongsToMany('App\Models\Formula', 'rel_formulas_technologies', 'technology_id', 'formula_id')->withTimestamps();
	}

	public function calc_formula($id)
	{
		$formula = Formula::find($id);
		// need to search the formula string for fields, inputs, and formulas
		$fields = []; // fields are escaped by '##'
		$inputs = Input::all()->pluck('input_value', 'input_name')->toArray(); // inputs are escaped by '$$'

		$formulas = []; // formulas are escaped by '!!'
		
		$text = $formula->formula;
		// $text = str_replace(' ', '', $text);
		$text = str_replace('##', '$this->', $text);
		$text = str_replace('$$', '$inputs[\'', $text);
		$text = str_replace('%%', '\']', $text);
		$text = str_replace('!!', '$this->eval_formula(\'', $text);
		$text = str_replace('^^', '\')', $text);
		
		if($formula->is_conditional == 0)
			{
				$result = eval(" return " . $text . ";");
			}
		else
		{
				// $test = " if(4>6) { return 20*5; } else { return 10*3; }";
			$result = eval($text);
		}

	   
	   

		return $result;

	}
	public function eval_formula($formula)
	{
		$inputs = Input::all()->pluck('input_value', 'input_name')->toArray(); // inputs are escaped by '$$'

		$f = Formula::where('formula_name', $formula)->first();
		$text = $f->formula;
		$text = str_replace('##', '$this->', $text);
		$text = str_replace('$$', '$inputs[\'', $text);
		$text = str_replace('%%', '\']', $text);
		$result = eval(" return " . $text . ";");
		// dd($result);
		return $result;
	}

	public function setAdjustmentFactorProjectCostAttribute($value)
    {
        $this->attributes['adjustment_factor_project_cost'] = $value/100;
	}
	
	public function getAdjustmentFactorProjectCostAttribute($value)
    {
        return $value * 100;
	}
	public function setAdjustmentFactorOMCostAttribute($value)
    {
        $this->attributes['adjustment_factor_o_m_cost'] = $value/100;
	}
	
	public function getAdjustmentFactorOMCostAttribute($value)
    {
        return $value * 100;
	}	
	
	public function setReplacementCostFactorAttribute($value)
    {
        $this->attributes['replacement_cost_factor'] = $value/100;
	}
	
	public function getReplacementCostFactorAttribute($value)
    {
        return $value * 100;
	}

	public function calculated()
	{
		$calculated = DB::select("
			select
			id,
			technology_id,

			p_percent_reduction_low,
			p_percent_reduction_high,
			baseline_concentration_p,
			flow_gpd,
			p_removed_low,
			p_removed_high,
			p_removed_avg,
			p_removed_planning_period,

			n_percent_reduction_low,
			n_percent_reduction_high,
			baseline_concentration_n,
			n_removed_low,
			n_removed_high,
			n_removed_avg,
			n_removed_planning_period,

			current_project_cost_low,
			current_project_cost_high,
			adjustment_factor_project_cost,
			replacement_cost_factor,
			useful_life_years,
			n_per_years,

			discount_rate,
			adj_project_cost_low,
			adj_project_cost_high,
			adj_project_cost_avg,
			replacement_cost,
			total_replacement_cost,
			project_cost_pv,

			current_annual_o_m_cost_low,
			current_annual_o_m_cost_high,
			adjustment_factor_o_m_cost,

			adj_o_m_cost_low,
			adj_o_m_cost_high,
			adj_o_m_cost_avg,

			cost_per_kg_avg_project_cost_n,
			cost_per_kg_avg_project_cost_p,
			cost_per_kg_avg_om_cost_n,
			cost_per_kg_avg_om_cost_p,
			cost_per_kg_avg_lifecycle_cost_n,
			cost_per_kg_avg_lifecycle_cost_p
			
			from Technology_Calculations() 
			where id = " . $this->id );
		return $calculated[0];
	}


	public function calc()
	{ 
		/*

			select t.id,
			t.current_project_cost_low, t.current_project_cost_high,
			t.useful_life_years,
			n.n_removed_low, n.n_removed_high, n.n_removed_avg,
			np.n_kg_removed as n_removed_planning_period,
			p.p_removed_low, p.p_removed_high, p.p_removed_avg,
			pp.p_kg_removed as p_removed_planning_period,
			pc.adj_project_cost_low,
			pc.adj_project_cost_high,
			pc.adj_project_cost_avg,
			omc.adj_o_m_cost_low,
			omc.adj_o_m_cost_high,
			omc.adj_o_m_cost_avg,
			pc.replacement_cost,
			pc.total_replacement_cost,
			pc.project_cost_pv
			from technologies t 
			left outer join N_Removed_Per_Year() n on t.id = n.id
			left outer join P_removed_per_year() p on t.id = p.id
			left outer join N_Reduction_Per_Planning_Period() np on t.id = np.id
			left outer join P_Reduction_Per_planning_period() pp on t.id = pp.id
			left outer join Project_Costs() pc on t.id = pc.id
			left outer join Adjusted_O_M_Cost() omc on t.id = omc.id

		*/
		
	}
}
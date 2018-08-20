<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Technology extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   public function toArray($request)
    {
        return [
            'id' => $this->technology_id,
			'name' => $this->technology_strategy,
			'description' => $this->technology_description,
			'icon' => $this->icon,
			'image' => $this->image,
			'advantages' => $this->advantages,
			'disadvantages' => $this->disadvantages,
			'references' => $this->references_notes_assumptions,
			'useful_life_years' => $this->useful_life_years,
			'technology_type' => $this->technology_type->technology_type,
			'approach' => $this->approach->approach,
			'calc' => $this->calculated(),
			'current_construction_cost_avg' => (($this->current_construction_cost_high + $this->current_construction_cost_low)/2),
			'current_construction_cost_percent_labor' => $this->current_construction_cost_percent_labor*100,
			'siting_requirements' => (sizeof($this->siting_requirements) > 0 ? $this->siting_requirements : 'None'),
			'time_to_improve' => (sizeof($this->time_to_improve_estuary) > 0 ? $this->time_to_improve_estuary : 'N/A'),
			'n_percent_reduction_low' => $this->n_percent_reduction_low,
			'n_percent_reduction_high' => $this->n_percent_reduction_high,
			'p_percent_reduction_low' => $this->p_percent_reduction_low,
			'p_percent_reduction_high' => $this->p_percent_reduction_high,
			'scales' => $this->scales,			
			'longterm_monitoring_cost' => (is_null($this->longterm_monitoring_cost)? 'N/A' : $this->longterm_monitoring_cost()->first()->est_annual_cost),
			'evaluation_monitoring_cost' => (is_null($this->evaluation_monitoring_cost)? 'N/A' : $this->evaluation_monitoring_cost()->first()->est_annual_cost),
			'years_of_evaluation_monitoring' => $this->years_of_evaluation_monitoring()->first()->length_of_time,
			'updated_at' => $this->updated_at,
			'benefits' => $this->ecosystem_services,
			'permitting_agencies' => $this->permitting_agencies
        ];
    }
}

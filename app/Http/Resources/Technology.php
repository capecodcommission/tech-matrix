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
			'image' => "images/" . $this->image,
			'advantages' => $this->advantages,
			'disadvantages' => $this->disadvantages,
			'references' => $this->references_notes_assumptions,
			'useful_life_years' => $this->useful_life_years,
			'technology_type' => $this->technology_type->technology_type,
			'approach' => $this->approach->approach,
			'calc' => $this->calculated(),
			'siting_requirements' => (sizeof($this->siting_requirements) > 0 ? $this->siting_requirements : 'None'),
			'n_percent_reduction_low' => $this->n_percent_reduction_low,
			'n_percent_reduction_high' => $this->n_percent_reduction_high,
			'p_percent_reduction_low' => $this->p_percent_reduction_low,
			'p_percent_reduction_high' => $this->p_percent_reduction_high,
			'scales' => $this->scales,			
            'updated_at' => $this->updated_at
        ];
    }
}

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
			'calc' => $this->calculated(),
            'updated_at' => $this->updated_at
        ];
    }
}

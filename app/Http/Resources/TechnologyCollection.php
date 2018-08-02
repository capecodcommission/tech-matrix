<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TechnologyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		
		return [
            'data' => $this->collection->transform(function($item){
				$item->calc = $item->calculated();
				$scales = array();
				foreach($item->scales as $each) 
				{
					$scales[] = $each->scale;
				}
				return [
                    'id' => $item->id,
                    'name' => $item->technology_strategy,
					'icon' => $item->icon,
					'scales' => $scales,
					'n_removed_avg' => round($item->calc->n_removed_avg),
					'p_removed_avg' => round($item->calc->p_removed_avg),
					'useful_life_years'	=> $item->useful_life_years
                ];
            }),
        ];

        
    }
}
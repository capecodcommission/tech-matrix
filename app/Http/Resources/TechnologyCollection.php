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
		$matrix = $this->collection->filter(function($value, $key) {
			if ($value['show_on_matrix'] > 0) {
				return true;
			}
		});
		return [
			'data' => $matrix->transform(function($item) {
			// $this->collection->transform(function($item){
				$item->calc = $item->calculated();
				$scales = array();
				foreach($item->scales as $each) 
				{
					$scales[] = $each->scale;
				}
				if($item->show_on_matrix > 0)
				{
					return [
						'id' => $item->id,
						'name' => $item->technology_strategy,
						'icon' => $item->icon,
						'scales' => $scales,
						'n_percent_reduction_low' => $item->n_percent_reduction_low,
						'n_percent_reduction_high' => $item->n_percent_reduction_high,
						'p_percent_reduction_low' => $item->p_percent_reduction_low,
						'p_percent_reduction_high' => $item->p_percent_reduction_high,
						'useful_life_years'	=> $item->useful_life_years
					];
				}
			}),
        ];

        
    }
}
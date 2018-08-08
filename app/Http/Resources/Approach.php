<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Approach extends ResourceCollection
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
				$list = array();
				foreach($item->technologies as $each) 
				{
					$each->calc = $each->calculated();
					$each->icon = "icons/" . $each->icon;
					$scales = array();
					foreach($each->scales as $one) 
					{
						$scales[] = $one->scale;
					}
					$list[] = $each;
					// $list[$each->id]['id'] = $each->id;
					// $list[$each->id]['name'] = $each->technology_strategy;
                    // $list[$each->id]['name'] = $each->technology_strategy;
					// $list[$each->id]['icon'] = $each->icon;
					// $list[$each->id]['scales'] = $scales;
					// $list[$each->id]['n_removed_avg'] = round($each->calc->n_removed_avg);
					// $list[$each->id]['p_removed_avg'] = round($each->calc->p_removed_avg);
					// $list[$each->id]['useful_life_years'] = $each->useful_life_years;
				}		
				return [
                    'id' => $item->id,
					'approach' => $item->approach,
					'technologies' => $list
                ];
            }),
        ];

        
    }
}

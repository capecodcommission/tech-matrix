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
				$scales = array();
				foreach($item->scales as $each) 
				{
					$scales[] = $each->scale;
					$each->calc = $each->calculated();
				}
				return [
                    'id' => $item->id,
                    'name' => $item->technology_strategy,
					'icon' => $item->icon,
					'scales' => $scales,
					'n_removed_avg' => $item->calc->n_removed_avg,
					'p_removed_avg' => $item->calc->p_removed_avg
                ];
            }),
        ];

        
    }
}
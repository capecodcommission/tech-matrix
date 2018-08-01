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
		$scales = array();
		foreach($item->scales as $each) 
		{
			$scales[] = $each->scale;
		}
		return [
            'data' => $this->collection->transform(function($item){
                return [
                    'id' => $item->id,
                    'name' => $item->technology_strategy,
					'icon' => $item->icon,
					'scales' => $scales
                ];
            }),
        ];

        
    }
}
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
				return [
                    'id' => $item->id,
					'approach' => $item->approach,
					'technologies' => $item->technologies
                ];
            }),
        ];

        
    }
}

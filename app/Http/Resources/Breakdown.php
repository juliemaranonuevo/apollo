<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Breakdown extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $random = [
            'id' => $this->id,
            'values' => $this->values,
            'randomId' => $this->random_id
        ];

        return array_filter($random);
    }
}

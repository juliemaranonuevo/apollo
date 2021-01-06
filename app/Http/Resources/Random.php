<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Random extends JsonResource
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
            'values' => $this->values
        ];

        return array_filter($random);
    }
}

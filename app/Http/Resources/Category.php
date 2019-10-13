<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($this);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'children' => $this->children,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}

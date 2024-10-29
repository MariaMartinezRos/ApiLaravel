<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description'=> $this->description,
            'price' => number_format($this->price/100,2),
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}

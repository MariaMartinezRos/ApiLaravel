<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array    //resolver este problema////////////////////////////////////////
        //esto es para cuando el request sea para categorias, solo traiga los primeros 20 caracteres de la descripcion, sino toda la descripcion
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->when($request->is('api/categories*'), function () use ($request) {
//                return $this->description;
                if($request->is('api/categories')){
                    return str($this->description)->limit(20);
                }
                return $this->description;
            }),
        ];
    }
}

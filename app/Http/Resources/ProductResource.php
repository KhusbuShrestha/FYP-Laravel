<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "sku"=>$this->sku,
            "name"=>$this->name,
            "price"=>$this->price,
            "discount"=>$this->discount,
            "sp"=>$this->sp,
            "description"=>$this->description,
            "category"=>$this->category_id,
            "picture"=>asset($this->picture),
        ];
    }
}

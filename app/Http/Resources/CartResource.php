<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "sp"=>$this->sp,
            "quantity"=>$this->quantity,
            "product"=>$this->product_id,
            "user"=>$this->user_id,
            "picture"=>asset($this->picture),
        ];
    }
}

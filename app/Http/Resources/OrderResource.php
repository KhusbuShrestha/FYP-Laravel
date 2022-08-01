<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "o_code"=>$this->o_code,
            "total"=>$this->total,
            "deliveryCharge"=>$this->deliveryCharge,
            "grandTotal"=>$this->grandTotal,
            "user_id"=>$this->user_id,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
        ];

    }
}

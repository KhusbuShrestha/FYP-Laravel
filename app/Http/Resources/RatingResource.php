<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            // 'product_id' => $this->product->id,
            'id' => $this->product->id,
            'sku'=>$this->product->sku,
            'image' => asset($this->product->picture),
            'price' => $this->product->price,
            'discount' => $this->product->discount,
            'selling_price' => $this->product->sp,
            'description'=>$this->product->description,
            'product' => $this->product->name,
            'rating' => $this->rating,
            'category'=>$this->product->category_id,
        ];
    }
}

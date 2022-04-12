<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category as CategoryResource;

class Product extends JsonResource
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
            'product_id' => $this->id,
            'product_name' => $this->name,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'description' => $this->description,
            'selling_price' => $this->selling_price,
            'image' => $this->image,
            'quantity' => $this->qty,
            'status' => $this->status,
            'trending' => $this->trending,
            'category' => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}

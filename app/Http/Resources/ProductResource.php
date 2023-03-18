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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,

            'image' => $this->image,
            'inStock' => $this->inStock,
            'categoryId' => $this->category_id,
            'cantidad' => $this->whenPivotLoaded('order_products', function (){
                return $this->pivot->cantidad;
            })
        ];
    }
}

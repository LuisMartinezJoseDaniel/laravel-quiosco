<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total'=> $this->total,
            'userId'=> $this->user_id,
            'status'=> $this->status,
            'user'=>$this->whenLoaded('user'),
            'products'=> ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}

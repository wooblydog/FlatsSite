<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferItemResource extends JsonResource
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
            'id' => $this->id,
            'offerId' => $this->offer_id,
            'type' => $this->type,
            'square' => $this->square,
            'complex' => $this->complex,
            'house' => $this->house,
            'description' => $this->description,
            'images' => json_decode($this->images),
            'like' => $this->like,
            'price' => $this->price
        ];
    }
}

<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'b24ContactId' => $this->b24_contact_id,
            'b24DealId' => $this->b24_deal_id,
            'b24ManagerId' => $this->b24_manager_id,
            'managerFio' => $this->manager_fio,
            'phone' => $this->phone,
            'position' => $this->position,
            'avatar' => $this->avatar,
            'dateEnd' => $this->date_end,
            'status' => $this->status,

        ];
    }
}


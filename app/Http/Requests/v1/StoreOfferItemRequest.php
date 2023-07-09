<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'offerId' => ['required'],
            'type' => ['required'],
            'square' => ['required'],
            'complex' => ['required'],
            'house' => ['required'],
            'description' => ['required'],
            'images' => ['array'],
            'price' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['offer_id' => $this->offerId]);
    }
}

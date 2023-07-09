<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreOfferRequest extends FormRequest
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
            'b24ContactId' => ['required'],
            'b24DealId' => ['required'],
            'b24ManagerId' => ['required'],
            'managerFio' => ['required'],
            'phone' => ['required'],
            'position' => ['required'],
            'avatar' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'b24_contact_id' => $this->b24ContactId,
            'b24_deal_id' => $this->b24DealId,
            'b24_manager_id' => $this->b24ManagerId,
            'manager_fio' => $this->managerFio,
            'guid' => Str::uuid()->toString()
        ]);
    }
}


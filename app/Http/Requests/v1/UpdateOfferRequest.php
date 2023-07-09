<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'b24ManagerId' => ['required'],
                'managerFio' => ['required'],
                'position' => ['required'],
                'avatar' => ['required'],
                'status' => ['required'],
                'dateEnd' => ['sometimes', 'required'],
            ];
        } else {
            return [
                'b24ManagerId' => ['sometimes', 'required'],
                'managerFio' => ['sometimes', 'required'],
                'position' => ['sometimes', 'required'],
                'avatar' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
                'dateEnd' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->b24ManagerId && $this->managerFio) {
            $this->merge([
                'b24_manager_id' => $this->b24ManagerId,
                'manager_fio' => $this->managerFio,
                'date_end' => $this->dateEnd
            ]);
        }
    }
}

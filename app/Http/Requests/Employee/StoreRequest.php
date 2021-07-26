<?php

namespace App\Http\Requests\Employee;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'company_id' => ['required'],
            'first_name' => ['required', 'min:3', 'max:100'],
            'last_name' => ['required', 'min:3', 'max:100'],
            'email' => ['max:100'],
            'phone' => ['max:20'],
        ];
    }

    public function data()
    {
        return [
            'company_id' => $this->input('company_id'),
            'first_name' => $this->input('first_name'),
            'middle_name' => $this->input('middle_name'),
            'last_name' => $this->input('last_name'),
            'email' => $this->input('email'),
            'phone' => $this->input('phone'),
        ];
    }
}

<?php

namespace App\Http\Requests\Company;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'main_logo' => ['max:2048', 'mimes:png,jpeg,gif'],
            'name' => ['required', 'min:3', 'max:250'],
            'email' => ['required', 'max:100'],
            'phone' => ['required', 'max:20'],
            'website' => ['required', 'max:100'],
        ];
    }
}

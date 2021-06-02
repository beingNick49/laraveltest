<?php

namespace App\Http\Requests\Company;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:250'],
            'email' => ['max:100'],
            'logo' => ['max:2048', 'mimes:png,jpeg,gif', 'dimensions:min_width=100,min_height=100'],
            'website' => ['max:100'],
        ];
    }
}

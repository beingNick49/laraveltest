<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class PasswordUpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'password' => ['required', 'confirmed', 'min:6', 'max:100'],
        ];
    }
}

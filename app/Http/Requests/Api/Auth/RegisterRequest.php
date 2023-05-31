<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:250'],
            'password' => 'required', 'string', 'min:6', 'max:250',
        ];
    }
}

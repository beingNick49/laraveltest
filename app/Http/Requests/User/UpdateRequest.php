<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'password' => ['max:100'],
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'status' => $this->input('status'),
        ];
    }
}

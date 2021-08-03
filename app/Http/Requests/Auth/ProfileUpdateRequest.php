<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class ProfileUpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:250']
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name')
        ];
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordUpdateRequest;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('backend.password.index');
    }

    public function update(PasswordUpdateRequest $request)
    {
        auth()->user()->update(['password' => Hash::make(request('password'))]);
        toast('Password changed successfully !!', 'success');

        return redirect()->route('dashboard.index');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function update(ProfileUpdateRequest $request)
    {
        auth()->user()->update($request->data());
        toast('Profile updated successfully !!', 'success');

        return redirect()->route('dashboard.index');
    }
}
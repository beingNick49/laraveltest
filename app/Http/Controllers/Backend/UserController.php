<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    protected $viewPath = 'backend.user.';
    protected $baseRoute = 'user.index';

    public function index()
    {
        $data = [];
        $data['users'] = User::where('id', '!=', auth()->user()->id)
            ->latest()
            ->paginate(10);

        return view($this->viewPath . 'index', compact('data'));
    }

    public function create()
    {
        $data = [];
        $data['model'] = new User();

        return view($this->viewPath . 'create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        User::create($request->data());

        return redirect()->route($this->baseRoute);
    }

    public function show(User $user)
    {
        return view($this->viewPath . 'show', compact('user'));
    }

    public function edit(User $user)
    {
        return view($this->viewPath . 'edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->data());

        return redirect()->route($this->baseRoute);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route($this->baseRoute);
    }
}

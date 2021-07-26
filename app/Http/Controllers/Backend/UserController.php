<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $viewPath = 'backend.user.';
    protected $baseRoute = 'user.index';

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render($this->viewPath . 'index');
    }

    public function create()
    {
        $data = [];
        $data['model'] = new User();

        return view($this->viewPath . 'create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        $request->merge(['password' => Hash::make($request->get('password'))]);
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
        $request->merge(['password' => Hash::make($request->get('password'))]);
        $user->update($request->data());

        return redirect()->route($this->baseRoute);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route($this->baseRoute);
    }

    public function status(User $user)
    {
        $user->update(['status' => !$user->status]);

        return redirect()->route($this->baseRoute);
    }
}

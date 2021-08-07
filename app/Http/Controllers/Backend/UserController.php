<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    protected $view_path = 'backend.user.';
    protected $base_route = 'user';
    protected $panel = 'User';

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render(parent::loadDataToView($this->view_path . 'index'));
    }

    public function create()
    {
        $data = [];
        $data['model'] = new User();

        return view(parent::loadDataToView($this->view_path . 'create'), compact('data'));
    }

    public function store(StoreRequest $request)
    {
        $request->merge(['password' => Hash::make($request->get('password'))]);
        User::create($request->data());
        toast($this->panel . ' created successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }

    public function show(User $user)
    {
        return view(parent::loadDataToView($this->view_path . 'show'), compact('user'));
    }

    public function edit(User $user)
    {
        return view(parent::loadDataToView($this->view_path . 'edit'), compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request->get('password'))]);
        $user->update($request->data());
        toast($this->panel . ' updated successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast($this->panel . ' deleted successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }

    public function status(User $user)
    {
        $user->update(['status' => !$user->status]);
        toast($this->panel . ' status changed successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users'] = User::count();
        $data['companies'] = Company::count();
        $data['employees'] = Employee::count();

        return view('backend.dashboard.index', compact('data'));
    }
}
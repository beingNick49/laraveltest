<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EmployeesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $viewPath = 'backend.employee.';
    protected $baseRoute = 'employee.index';

    public function index(EmployeesDataTable $employeesDataTable)
    {
        return $employeesDataTable->render($this->viewPath . 'index');
    }

    public function create()
    {
        $data = [];
        $data['model'] = new Employee();
        $data['companies'] = Company::select('id', 'name')->pluck('name', 'id');

        return view($this->viewPath . 'create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        Employee::create($request->data());

        return redirect()->route($this->baseRoute);
    }

    public function show(Employee $employee)
    {
        return view($this->viewPath . 'show', ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        $data = [];
        $data['companies'] = Company::select('id', 'name')->pluck('name', 'id');

        return view($this->viewPath . 'edit', compact('employee', 'data'));
    }

    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee->update($request->data());

        return redirect()->route($this->baseRoute);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route($this->baseRoute);
    }
}

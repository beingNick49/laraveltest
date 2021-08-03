<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EmployeesDataTable;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends BaseController
{
    protected $view_path = 'backend.employee.';
    protected $base_route = 'employee.index';
    protected $panel = 'Employee';

    public function index(EmployeesDataTable $employeesDataTable)
    {
        return $employeesDataTable->render(parent::loadDataToView($this->view_path . 'index'));
    }

    public function create()
    {
        $data = [];
        $data['model'] = new Employee();
        $data['companies'] = Company::select('id', 'name')->pluck('name', 'id');

        return view(parent::loadDataToView($this->view_path . 'create'), compact('data'));
    }

    public function store(StoreRequest $request)
    {
        Employee::create($request->data());
        toast($this->panel . ' created successfully !!', 'success');

        return redirect()->route($this->base_route);
    }

    public function show(Employee $employee)
    {
        return view(parent::loadDataToView($this->view_path . 'show'), ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        $data = [];
        $data['companies'] = Company::select('id', 'name')->pluck('name', 'id');

        return view(parent::loadDataToView($this->view_path . 'edit'), compact('employee', 'data'));
    }

    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee->update($request->data());
        toast($this->panel . ' updated successfully !!', 'success');

        return redirect()->route($this->base_route);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        toast($this->panel . ' deleted successfully !!', 'success');

        return redirect()->route($this->base_route);
    }
}

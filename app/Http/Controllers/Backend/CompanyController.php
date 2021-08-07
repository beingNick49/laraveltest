<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CompaniesDataTable;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyController extends BaseController
{
    protected $view_path = 'backend.company.';
    protected $base_route = 'company';
    protected $panel = 'Company';
    protected $folderPath;

    public function __construct()
    {
        $this->folderPath = storage_path('app/public/uploads/images/company/');
    }

    public function index(CompaniesDataTable $companiesDataTable)
    {
        return $companiesDataTable->render(parent::loadDataToView($this->view_path . 'index'));
    }

    public function create()
    {
        $data = [];
        $data['model'] = new Company();

        return view(parent::loadDataToView($this->view_path . 'create'), compact('data'));
    }

    public function store(StoreRequest $request)
    {
        if ($request->has('main_logo')) {
            $file = $request->file('main_logo');
            $fileName = Str::random(25) . '.' . $file->getClientOriginalExtension();
            $file->move($this->folderPath, $fileName);
            $request->merge(['logo' => $fileName]);
        }
        Company::create($request->all());
        toast($this->panel . ' created successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }

    public function show(Company $company)
    {
        return view(parent::loadDataToView($this->view_path . 'show'), ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view(parent::loadDataToView($this->view_path . 'edit'), ['company' => $company]);
    }

    public function update(UpdateRequest $request, Company $company)
    {

        if ($request->has('main_logo')) {
            $file = $request->file('main_logo');
            $fileName = Str::random(25) . '.' . $file->getClientOriginalExtension();
            $file->move($this->folderPath, $fileName);
            $request->merge(['logo' => $fileName]);

            if ($company->logo) {
                if (file_exists($this->folderPath . $company->logo)) {
                    unlink($this->folderPath . $company->logo);
                }
            }
        }
        $company->update($request->all());
        toast($this->panel . ' updated successfully !!', 'success');

        return redirect()->route($this->base_route . '.index');
    }

    public function destroy(Company $company)
    {
        try {
            $company->delete();

            if ($company->logo) {
                if (file_exists($this->folderPath . $company->logo)) {
                    unlink($this->folderPath . $company->logo);
                }
            }
            toast($this->panel . ' deleted successfully !!', 'success');
        } catch (\Throwable $exception) {
            toast('you are not allowed to delete this company', 'error');
        }

        return redirect()->route($this->base_route . '.index');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    protected $viewPath = 'backend.company.';
    protected $baseRoute = 'company.index';
    protected $folderPath;

    public function __construct()
    {
        $this->folderPath = storage_path('app/public/uploads/images/company/');
    }

    public function index()
    {
        $data = [];
        $data['companies'] = Company::latest()->paginate(10);

        return view($this->viewPath . 'index', compact('data'));
    }

    public function create()
    {
        $data = [];
        $data['model'] = new Company();

        return view($this->viewPath . 'create', compact('data'));
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


        return redirect()->route($this->baseRoute);
    }

    public function show(Company $company)
    {
        return view($this->viewPath . 'show', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view($this->viewPath . 'edit', ['company' => $company]);
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

        return redirect()->route($this->baseRoute);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        if ($company->logo) {
            if (file_exists($this->folderPath . $company->logo)) {
                unlink($this->folderPath . $company->logo);
            }
        }

        return redirect()->route($this->baseRoute);
    }
}

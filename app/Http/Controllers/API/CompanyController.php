<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees')->withCount('employees')->get();

        return CompanyResource::collection($companies);
    }
}
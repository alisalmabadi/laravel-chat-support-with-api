<?php

namespace App\Http\Controllers\ApiControllers;

use App\Company;
use App\Http\Resources\CompanyCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Company as CompanyResource;

class DepartmentController extends Controller
{
    public function show($token)
    {
        $Company=Company::where('token',$token)->first();
        return new CompanyResource($Company);
    }
}

<?php
namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;
class CompanyController extends Controller
{
    public function index()
    {
      return new CompanyCollection(Company::all());
    }
}

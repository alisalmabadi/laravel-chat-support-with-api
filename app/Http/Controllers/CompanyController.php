<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
         $this->middleware('admin')->only(['index','create','store','edit','update','destroy']);
        $this->middleware('company')->only('Company_panel');

    }

    public function show($id)
    {
        $company=Company::where('id',$id)->first();
        return view('admin.company.company_show',compact('company'));
    }
    public function create(Company $company)
    {
        return view('admin.company.company_add',compact('company'));
    }
    public function store(Request $request,Company $company)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'web'=>'required | url',
            'tel'=>'required',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'username'=>'required|unique:companies|min:3',
            'token'=>'required|unique:companies|min:5'
        ]);
        $company->create([
           'name'=>$request->name,
           'email'=>$request->email,
           'web'=>$request->web,
           'tel'=>$request->tel,
            'token'=>$request->token,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)
        ]);
        return redirect('admin/company');
    }
    public function Company_panel()
    {
        return view('company.home3');
    }
    public function index(){
        $companies=Company::all();
        return view('admin.company.company_index',compact('companies'));
    }
    public function edit(Company $company){
        return view('admin.company.company_edit',compact('company'));
    }
    public function update(Request $request,Company $company)
    {
        $this->validate($request,[
           'name'=>'required|min:3',
           'email'=>'required|email',
            'web'=>'required | url',
            'tel'=>'required',
            'token'=>'required|min:5|unique:companies,token,'. $company->id,
            'username'=>'required|min:3|unique:companies,username,'. $company->id,
            'password'=>'required|confirmed',
            'password_confirmation' => 'required|min:3'
        ]);
        $company->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'web'=>$request->web,
            'tel'=>$request->tel,
            'token'=>$request->token,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)
        ]);
        return redirect('admin/company');
    }

    public function destroy(Request $request)
    {
        Company::find($request->id)->delete();
        return redirect('admin/company');
    }
}

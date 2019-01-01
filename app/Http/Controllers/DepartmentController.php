<?php

namespace App\Http\Controllers;
use App\Operator;
use App\Department;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['index','create','store','edit','update','destroy','load_department']);
    }


    public function show()
    {
    }

    public function create(Department $department)
    {
        $operators=Operator::all();
        $companies=Company::all();
        return view('admin.department.department_add',compact('operators','companies','department'));

    }
    public function store(Request $request,Operator $operator,Department $department)
    {
    $this->validate($request,[
       'name'=>'required',
        'company'=>'required|numeric'
    ]);
        $department=$department->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'company_id'=>$request->company,
        ]);
        $department->operators()->attach($request->operator);
        $department->save();
        return redirect('admin/department');
    }

    public function index(){
        $departments = Department::all();
        return view('admin.department.department_show',compact('departments'));
    }
    public function edit(Department $department){
       $operators=Operator::all();
       $companies=Company::all();
        return view('admin.department.department_edit',compact('operators','companies','department'));
    }
    public function update(Request $request,Department $department)
    {
        $this->validate($request,[
           'name'=>'required',
           'company'=>'required|numeric'
        ]);
        $department->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'company_id'=>$request->company,
        ]);

        $department->operators()->sync($request->operator);
        $department->save();
        return redirect('admin/department');
    }

    public function destroy(Request $request)
    {
        Department::find($request->id)->delete();
        return redirect('admin/department');

    }

    public function load_department(Request $request)
    {
        if($request->ajax()){
        $departments=Department::where('company_id',$request->id)->get();
        $data = view('admin.department.ajax_options',compact('departments'))->render();
        return response()->json(['options' => $data]);

        }
    }
}

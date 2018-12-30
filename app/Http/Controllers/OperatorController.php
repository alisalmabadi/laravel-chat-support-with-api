<?php

namespace App\Http\Controllers;
use App\Company;
use App\Conversation;
use App\Message;
use App\Operator;
use Illuminate\Http\Request;
use App\Department;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['index','create','store','index','edit','update','destroy','load_operator']);
        $this->middleware('auth')->only('operator_panel');
    }

    public function operator_panel()
    {
        $departments = \Auth::user()->departments()->get();
        $operator_id = \Auth::user()->id;
        $conversation = Conversation::where('operator_id', $operator_id)->get();
        if ($conversation != null){
            foreach ($conversation as $conv) {
                $messages[] = Message::where([['type', 2], ['conversation_token', $conv->token]]);
            }
    }
        $loader[]=null;
        $loader['department_count']=count($departments);
        $loader['activeconv_count']=Conversation::ConversationCount();
        if(/*$messages!='' || $messages!=null || */isset($messages)) {
            $loader['messages_count'] = count($messages);
        }else{
            $loader['messages_count'] = 0;
        }
        $loader['conv_count']=count($conversation);
        return view('vendor.adminlte.home',compact('loader','conversation'));
    }


    public function show()
    {
    }
    public function create(Operator $operator)
    {
        $departments=Department::all();
        $companies=Company::all();
        return view('admin.operator.operator_add',compact('operator','companies','departments'));

    }
    public function store(Request $request,Operator $operator)
    {
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required|min:3|unique:operators',
            'email'=>'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ]);

        $operator=$operator->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'company_id'=>$request->company
        ]);
        $operator->departments()->attach($request->department);
        return redirect('admin/operator');
    }

    public function index(){
        $operators =Operator::all();
        return view('admin.operator.operator_show',compact('operators'));
    }
    public function edit(Operator $operator){
        $companies=Company::all();
        return view('admin.operator.operator_edit',compact('operator','companies'));
    }
    public function update(Request $request,Operator $operator)
    {
        $this->validate($request,[
           'name'=>'required',
           'username'=>'required|unique:operators,username,'.$operator->id,
            'email'=>'email',
            'company'=>'required|numeric'
        ]);
        $operator->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'company_id'=>$request->company
        ]);
        $operator->departments()->sync($request->department);
        return redirect('admin/operator');
    }

    public function destroy(Request $request)
    {
        Operator::find($request->id)->delete();
        return redirect('admin/operator');

    }

    public function load_operator(Request $request)
    {
        if($request->ajax()){
            $operators=Operator::where('company_id',$request->id)->get();
            $data = view('admin.operator.ajax_options',compact('operators'))->render();
            return response()->json(['options' => $data]);
        }
    }

}

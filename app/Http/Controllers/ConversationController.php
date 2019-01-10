<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Company;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $department = \Auth::user()->departments()->get(array('id'));
        $operator_id = \Auth::user()->id;
        $company_id = \Auth::user()->company_id;
        $company = Company::where('id', $company_id)->first();
        foreach ($department as $departments){
            $ids[]=$departments->id;
        }
        if(isset($ids)){
        $conversations = Conversation::whereIn('department_id',$ids)->where([['status', 0], ['end_conv', 0], ['company_token', $company->token]])->orWhere([['operator_id', $operator_id], ['end_conv', 0]])->get();
        }else{
            $conversations=null;
        }
        return view('vendor.adminlte.conversation.index',compact('conversations'));

    }
    public function show($id)
    {
        $conversation=Conversation::where('id',$id)->first();
        return view('vendor.adminlte.conversation.conversation_show',compact('conversation'));

    }

    public function sidebar()
    {
       /* $conversations=new Conversation();
        return view('vendor.adminlte.layouts.app',compact('conversations'));*/

    }

    public function DisactiveConversation(Request $request)
    {
        $conversation=Conversation::where('id',$request->id)->first();
        $conversation=$conversation->update([
           'end_conv'=>  1
        ]);
        if($conversation){
            return Response()->json(['message'=>'ok!',200]);
        }else{
            return Response()->json(['message'=>'not!',200]);

        }
    }

    public function ActiveConversation(Request $request)
    {
        $operator_id= $request->operator_id;
        $conversation=Conversation::where('id',$request->id)->first();
        $conversation=$conversation->update([
            'status'=>  1,
            'operator_id'=>$operator_id
        ]);
        if($conversation){
            return Response()->json(['message'=>'ok!',200]);
        }else{
            return Response()->json(['message'=>'not!',200]);

        }
    }

    public function EndConversation(Request $request)
    {
        $conversation=Conversation::where('token',$request->conversation_token)->first();
        $conversation=$conversation->update([
            'end_conv'=>  1
        ]);
        if($conversation){
            return Response()->json(['message'=>'ok!',200]);
        }else{
            return Response()->json(['message'=>'not!',200]);

        }
        return redirect(url('operator/conversation'));
    }

    public function index_all()
    {
        $operator_id=\Auth::user()->id;
        $conversations=Conversation::where([['status',1],['operator_id',$operator_id]])->get();
        return view('vendor.adminlte.conversation.index_all',compact('conversations'));

    }

    public function show_one($id)
    {
        $conversation=Conversation::where('id',$id)->first();
        $message=Message::where('conversation_token',$conversation->token)->get();
        return view('vendor.adminlte.conversation.last_conversation_show',compact('conversation','message'));

    }

}

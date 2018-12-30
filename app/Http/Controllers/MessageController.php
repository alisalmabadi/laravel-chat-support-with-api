<?php

namespace App\Http\Controllers;
use App\Conversation;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendmessage(Request $request, Message $message)
    {
        $operator_id=\Auth::user()->id;
        $message->type = 2;
        $message->conversation_token = $request->conversation_token;
        $message->text = $request->text;
        if($message->save()){
            $conversation=Conversation::where('token',$request->conversation_token)->first();
            if($conversation->operator_id==null || $conversation->status==0){
                $conversation->update([
                   'status'=>1,
                   'operator_id'=>$operator_id
                ]);
            }
        }
        /* if($message->save()){
          /*   $data=view('vendor.adminlte.conversation.message')->render();
             return $data;
        }*/

    }

    public function recievemessage(Request $request)
    {
        $message = Message::where('conversation_token', $request->token)->orderByRaw('updated_at - created_at DESC')->get();
        $data = view('vendor.adminlte.conversation.message', compact('message'))->render();
        return response()->json(['data' => $data], 200);

    }
}
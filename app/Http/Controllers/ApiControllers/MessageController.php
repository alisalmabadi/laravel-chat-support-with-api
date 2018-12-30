<?php

namespace App\Http\Controllers\ApiControllers;
use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Message as MessageResource;
class MessageController extends Controller
{
    public function store(Message $message,Request $request){
        $message->type=$request->type;
        $message->conversation_token=$request->conversation_token;
        $message->text=$request->text;
        if($message->save()){
            return Response()->json(['message'=>'message sent','data'=>$message],200);
        }else{
            return Response()->json(['message'=>'an error occured!'],200);
        }
    }
    public function readmessage(Request $request)
    {
        $conversation=Conversation::where([['status',1],['end_conv','!=',1],['token',$request->token]])->get();
        if($conversation!=null){
        $messages = Message::where([['type',2],['id','>',$request->id],['conversation_token',$request->token]])->get();
        return MessageResource::collection($messages);

        }
    }
}

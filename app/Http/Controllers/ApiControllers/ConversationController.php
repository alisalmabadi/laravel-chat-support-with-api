<?php

namespace App\Http\Controllers\ApiControllers;

use App\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationController extends Controller
{
    public function store(Request $request,Conversation $conversation){

       $data = json_decode(file_get_contents('php://input'), true);
         if(isset($data['status'])){
        $conversation->subject=$data['subject'];
        $conversation->company_token=$data['company_token'];
        $conversation->department_id=$data['department_id'];
        $conversation->status=$data['status'];
        $conversation->token=sha1(date('sym').rand(1,1000).time());
        if($conversation->save()) {
            return response()->json(['token'=>$conversation->token,'message'=>'saved successfully'], 200);
        }else{
            return response()->json(['message','An Error occured!'], 200);
        }

        }else{
            $conversation->subject=$data['subject'];
            $conversation->company_token=$data['company_token'];
            $conversation->department_id=$data['department_id'];
            $conversation->token=sha1(date('sym').rand(1,1000).time());
            if($conversation->save()) {
                return response()->json(['token'=>$conversation->token,'message'=>'saved successfully'], 200);
            }else{
                return response()->json(['message','An Error occured!'], 200);
            }
        }
    }
}

<?php

namespace App;
use App\Conversation;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=['type','conversation_token','text'];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageCreated;

class MessageController extends Controller
{
    public function store(Request $req){
        $message = new Message;
        $message->content = $req->content;
        $message->chat_id = $req->route('chat');
        $message->user_id = $req->user()->id;
        $message->save();

        MessageCreated::dispatch();

        return back();
    }
}

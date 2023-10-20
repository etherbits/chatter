<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $req){
        $message = new Message;
        $message->content = $req->content;
        $message->chat_id = $req->route('chat');
        $message->user_id = $req->user()->id;
        $message->save();

        return back();
    }
}

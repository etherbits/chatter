<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use App\Events\ChatUpdated;

class MessageController extends Controller
{
    public function store(Request $req){
        $chatId = $req->route('chat');
        $message = new Message;
        $message->content = $req->content;
        $message->chat_id = $chatId;
        $message->user_id = $req->user()->id;
        $message->save();

        ChatUpdated::dispatch(Chat::find($chatId));

        return back();
    }
}

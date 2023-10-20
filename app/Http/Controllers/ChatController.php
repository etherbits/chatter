<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index(Request $req){
        $chats = Chat::all();
        return view('home', ['chats' => $chats]);
    }

    public function show(Request $req, Chat $chat){
        return view("chat", ['chat' => $chat, 'user' => $req->user()]);
    }

    public function store(Request $req){
        $chatName = $req->chatName;

        $chat = new Chat;
        $chat->name = $chatName;
        $chat->is_group = true;
        $chat->save();

        $chat->users()->attach($req->user()->id);

        return redirect("/");
    }
}

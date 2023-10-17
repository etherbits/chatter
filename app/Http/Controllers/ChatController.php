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

    public function store(Request $req){
        // dd($req->user()->name);
        $chatName = $req->chatName;

        $chat = new Chat;
        $chat->name = $chatName;
        $chat->is_group = true;
        $chat->save();

        return redirect("/");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function index(Request $req){
        $chats = $req->user()->chats()->get();
        return view('home', ['chats' => $chats]);
    }

    public function show(Request $req, Chat $chat){
        return view("chat", ['chat' => $chat, 'user_id' => $req->user()->id]);
    }

    public function addUser(Request $req, Chat $chat){
        $newUser = User::firstWhere('name', $req->name);
        $chat->users()->attach($newUser->id);
        $chat->save();

        return back();
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

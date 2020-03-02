<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use Unicorn\Author\Models\Users;

class ChatroomController extends Controller
{
    public function index()
    {
        return view('admin.chatroom.index');
    }
    public function chat()
    {
        # code...
    }
    public function getUserLogin()
    {
        return Auth::user();
    }
    public function messages()
    {
        return Message::with('users')->get();
    }
    public function postMessages(Request $r)
    {
        $user = Auth::user()->id;
        $save = Users::where('id',$user)->first();
        if($save){
            $message = $save->messages()->create(['message'=>request()->get('message')]);
        }
    }
}

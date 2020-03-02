<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

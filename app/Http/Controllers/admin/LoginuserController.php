<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginuserController extends Controller
{
    //
    public function getLogin()
    {
        return view('author::login.login');
    }
    public function postLogin(Request $r)
    {
        $r->validate([
            'email' =>'required|email',
            'password' =>'required|min:6'
        ],
        [
            'email.required'=>'Không được để trống tài khoản',
            'email.email'=>'Không đúng định dạng',
            'password.required'=>'Không được để trống',
            'password.min'=>'Không được nhỏ hơn 6 ký tự',
        ]);
        $result = Auth::attempt(['email' => $r->email, 'password' => $r->password]);
        if ($result) {
            return redirect('admin/home');
        }else{
            return redirect()->back();
        }
    }
}

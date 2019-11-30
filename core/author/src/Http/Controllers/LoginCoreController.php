<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Users;
use DB;


class LoginCoreController extends Controller
{
    public function getLogin()
    {
        return view('author::login.login');
    }
    public function postLogin(Request $r)
    {
        $credentials = $r->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('admin/home');
        }else{
            return redirect()->back();
        }
    }
}
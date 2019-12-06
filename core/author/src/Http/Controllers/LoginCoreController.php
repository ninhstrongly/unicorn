<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Users;
use DB;
use Validator;


class LoginCoreController extends Controller
{
    public function getLogin()
    {
        return view('author::login.login');
    }
    public function postLogin(Request $rq)
    {
        if (Auth::attempt(['email' => $rq->email, 'password'=>$rq->password],true)) {
            return redirect('admin/home');
        }else{
           return redirect()->back()->withInput();
        }
    }
}
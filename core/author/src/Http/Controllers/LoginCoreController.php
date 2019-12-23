<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;


class LoginCoreController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin/home');
        }
        return view('author::login.login');
    }
    public function postLogin(Request $rq)
    {
        $validator = Validator::make($rq->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ],
        [
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được bỏ trống',
            'password.min'=>'Mật khẩu tối thiểu là 6 ký tự'
        ]);
       
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $rq->email, 'password'=>$rq->password],true)) {
                return redirect('admin/home');
            }else{
                return redirect()->back();
            }
        }
        if ($validator->fails()) {
            return response([
                'errors' => true,
                'msg' => $validator->errors(),
            ]);
        }
    }
    public function getLogout()
    {
        $logout = Auth::logout();
        if ($logout == null) {
            return redirect('login');
        }else{
            return redirect()->back()->withInput();
        }
    }
}
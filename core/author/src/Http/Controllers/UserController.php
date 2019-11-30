<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Unicorn\Author\Http\Requests\AddUserRequest;
use Unicorn\Author\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Role;
use Unicorn\Author\Models\Users;
use Unicorn\Author\Models\RoleUser;
use DB;


class UserController extends Controller
{
    public function getListUser(){
        $users['users'] = Users::paginate(4);
        return view('author::admin.user.listuser',$users);
    }
    public function getAddUser(){
        $users = Users::all();
        $listRole = Role::all();
        return view('author::admin.user.adduser',compact('listRole','users'));
    }

    public function postAddUser(Request $r){
            $listUser = new Users;
            $listUser->email = $r->email;
            $listUser->password = bcrypt($r->password);
            $listUser->name = $r->name;
            $listUser->address = $r->address;
            $listUser->phone = $r->phone;
           
            $listUser->save();
            
            $listUser->roles()->attach($r->roles);
           
            return redirect('/admin/users')->with('add_user','Thêm thành viên thành công');
    }
    public function getEditUser($id){
        $users = Users::find($id);
        $listRole = Role::all();
        $listRoleAll = DB::table('role_user')->where('user_id',$id)->pluck('role_id');
        return view('author::admin.user.edituser',compact('users','listRole','listRoleAll'));
    }
    public function postEditUser(Request $r,$id)
    {
        try{
            DB::beginTransaction();
            $user = Users::find($id);
            
            $user->email = $r->email;
            if($r->password == ''){
                $user->password = $user->password;
            }
            else{
                $user->password = bcrypt($r->password);
            }
            $user->name = $r->name;
            $user->address = $r->address;
            $user->phone = $r->phone;
            
            $user->save();
            
            RoleUser::where('user_id',$id)->delete();
            
            $user_find = Users::find($id);
            $user_find->roles()->attach($r->roles);   
           
            DB::commit();
            return redirect('/admin/users')->with('edit_user','Sửa thành viên thành công');
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
    public function delUser($id)
    {
        try{
            DB::beginTransaction();
            $user = Users::find($id);
            $user->delete();
            $user->roles()->detach();
            DB::commit();
            return redirect('/admin/users')->with('del_user','Xóa thành viên thành công');
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
    public function getIndex()
    {
        return view('author::index');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
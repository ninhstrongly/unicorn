<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Role;
use DB;

class RoleController extends Controller{
    
    public function index()
    {
        $list = Role::all();
        return view('author::admin.role.index',compact('list'));
    }
    public function getCreate()
    {
        return view('author::admin.role.add');
    }
    public function postCreate(Request $r)
    {
        $list = new Role;
        $list->name = $r->name;
        $list->display_name = $r->display_name;
        $list->permission = json_encode($r->permission);
        $list->save();
        return redirect('/admin/role');
    }

    public function getEdit($id)
    {
        $listPer = Role::find($id);
       
        $json = json_decode($listPer->permission,true);
        
        return view('author::admin.role.edit',compact('json','listPer'));
    }

    public function postEdit(Request $r,$id)
    {
       
        $list = Role::find($id);
        $list->name = $r->name;
        $list->display_name = $r->display_name;
        $list->permission = json_encode($r->permission);
        
        $list->save();
        
        return redirect('/admin/role');
        
    }
    public function delete($id)
    {
        $user = Role::find($id)->delete();
        return redirect('/admin/role');
    }
}
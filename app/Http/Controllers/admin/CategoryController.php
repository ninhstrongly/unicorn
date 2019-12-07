<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAdd()
    {
        $db = Category::all()->toarray();
        return view('admin.category.add',compact('db'));
    }
    public function postAdd(Request $r)
    {
        $db = new Category;
        $db->name = $r->name;
        $db->slug = $r->slug;
        $db->parent_id = $r->parent_id;
        $db->save();
        return redirect()->back()->with('add_success','Thêm danh mục thành công');
    }

    public function getEdit($id){
        $db['category'] = Category::find($id);
        
        $db['categorys'] = Category::all()->toarray();
       
        return view('admin.category.edit',$db);
    }
    public function postEdit($id,Request $r){
        $db = Category::find($id);
        $db->name = $r->name;
        $db->slug = $r->slug;
        $db->parent_id = $r->parent_id;
        $db->save();
        return redirect('admin/category/')->with('edit_success','Sửa danh mục thành công');
    }

    public function getDel($id)
    {
        $db = Category::find($id)->delete();
        return redirect('admin/category/')->with('del_success','Xóa danh mục thành công');
    }
}
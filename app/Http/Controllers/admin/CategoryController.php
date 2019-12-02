<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function getCategory()
    {
        $data['category']=Category::all()->toarray();
        return view('admin.category.category',$data);
    }
    public function postCategory(Request $r){
        $categories=Category::all()->toArray();
        if(getLevel($categories, $r->parent_id, 1)<3){
            $category = new Category;
            $category->name =$r->name;
            $category->slug=Str::slug($r->name,'-');
            $category->parent_id=$r->parent;
            $category->save();
            return redirect()->back();
        }else {
            return redirect()->back()->withErrors(['name'=>'Trang web không hỗ trợ danh mục > 2 cấp']);
        }
    }
    public function getedit($id)
    {
        $data['category']=Category::all()->toarray();
        $data['cate']=Category::findOrFail($id);
        return view('admin.category.edit',$data);
    }
    public function postedit(Request $r,$id){
        $category = Category::findOrFail($id);
        $category->name =$r->name;
        $category->slug=Str::slug($r->name,'-');
        $category->parent_id=$r->parent;
        $category->save();
        return redirect()->back();
    }
    public function getdel($id){
        Category::destroy($id);
        return redirect()->back();
    }
}

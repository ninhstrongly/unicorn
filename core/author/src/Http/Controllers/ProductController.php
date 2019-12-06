<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\{Users,Attribute,Values,Product,Variant,Variant_values};
use DB;


class ProductController extends Controller
{
    public function getList()
    {
        $db = Product::all();
        return view('author::admin.product.index',compact('db'));
    }
    public function getAdd()
    {
        $attr = Attribute::all();
        return view('author::admin.product.add',compact('attr'));
    }
    public function postAdd(Request $r)
    {
        try {
            $prd = new Product;
            $prd->name = $r->name;
            $prd->price = $r->price;
            $prd->featured = $r->featured;
            $prd->state = $r->state;
            $prd->describe = $r->describe;
            $prd->category_id  = 1;
            
            $prd->save();
            
            if(!empty($r->attr)){
                // Thêm bảng values_product
                $mang = [];
                foreach ($r->attr as $value) {
                foreach ($value as $item) {
                    $mang[] = $item;
                    }
                }
               
                $prd->values()->Attach($mang);
                //end
                
                // get_combinations gộp các thuộc tính thành biến thể
                $variant = get_combinations($r->attr);
                //Thêm vào bảng variant -> biến thể
                foreach ($variant as $value) {
    
                $vari  = new Variant;
                $vari->product_id = $prd->id;
                $vari->save();
                $vari->values()->Attach($value);
                }
            }
            return redirect('/admin/product/add-variant/'.$prd->id.'')->with('add_success','Thêm sản phẩm thành công');
            $this->buildXMLHeader();
          
          } catch (\Exception $e) {
              return $e->getMessage();
          }
        
    }
    public function getEdit($id)
    {
        $attr = Attribute::all();
        $product = Product::find($id);
        return view('author::admin.product.edit',compact('attr','product'));
    }
    public function postEdit(Request $r,$id)
    {
        $prd = Product::find($id);
        $prd->name = $r->name;
        $prd->price = $r->price;
        $prd->featured = $r->featured;
        $prd->state = $r->state;
        $prd->describe = $r->describe;
        $prd->category_id = 1;
        $prd->save();
        $mang = [];
        foreach ($r->attr as $value) {
        foreach ($value as $item) {
            $mang[] = $item;
            }
        }
        $prd->values()->Sync($mang);

        $variant = get_combinations($r->attr);

        foreach ($variant as $var) {
            if(check_var($prd,$var)){
                $vari  = new Variant;
                $vari->product_id = $prd->id;
                $vari->save();
                $vari->values()->Attach($value);
            }
        }
        return redirect('/admin/product/')->with('edit_success','Sửa sản phẩm thành công');
        
    }
    public function getDel($id)
    {
        $prd = Product::find($id);
        $value_prd = [];
        //Del values_prd
        foreach($prd->values as $row){
            $value_prd[] = $row->id;
        }
        $prd->values()->Detach($value_prd);
        //Del_variant
        foreach($prd->variant as $row){
            $var_value = Variant_values::where('variant_id',$row->id)->delete();
            $var = Variant::where('product_id',$prd->id)->delete();
        }
        $prd = Product::find($id)->delete();
        return redirect('/admin/product/')->with('del_success','Xóa sản phẩm thành công');
    }
    public function getListAttr()
    {
        $db = Attribute::all();
        return view('author::admin.product.attr.index',compact('db'));
    }
    public function getAddAttr()
    {
        return view('author::admin.product.attr.add');
    }
    public function postAddAttr(Request $r)
    {
       
        $db = new Attribute;
        $db->name = $r->name;
        $db->save();
        return redirect('admin/product/list-attr');
    }
    public function getAddValue($id)
    {
        $db = Attribute::find($id);
        return view('author::admin.product.attr.add_value',compact('db'));
    }
    public function postAddValue(Request $r,$id)
    {
        $db = new Values;
        $db->value = $r->name;
        $db->attr_id = $id;
        $db->save();
        return redirect('admin/product/list-attr');
    }
    public function getEditAttr($id)
    {
        $db = Attribute::find($id);
       return view('author::admin.product.attr.edit',compact('db'));
    }
    public function postEditAttr(Request $r,$id)
    {
        $db = Attribute::find($id);
        $db->name = $r->name;
        $db->save();
        return redirect('admin/product/list-attr');
    }
    public function postDelAttr($id)
    {
        $db = Attribute::find($id)->values()->delete();
        $db = Attribute::find($id)->delete();
        return redirect('admin/product/list-attr');
    }
    public function getEditValue($id)
    {
        $db =  Values::find($id);
        return view('author::admin.product.attr.edit_value',compact('db'));
    }
    public function postEditValue(Request $r,$id)
    {
        $db =  Values::find($id);
        $db->value = $r->name;
        $db->save();
        return redirect('admin/product/list-attr');
    }
    public function postDelValue($id)
    {
        $db =  Values::find($id)->delete();
        return redirect('admin/product/list-attr');
    }
    public function AddVariant($id)
    {
        $data = Product::find($id); 
        return view('author::admin.product.variant.add',compact('data'));
    }
    public function postAddVariant(Request $r, $id)
    {
        
        foreach($r->variant as $key=>$value){
            $vari = Variant::find($key);
            $vari->price = $value;
            $vari->save();
        }
        return redirect('admin/product')->with('thongbao','them sp thanh cong');
    }
    public function EditVariant($id)
    {
        $data = Product::find($id);
        return view('author::admin.product.variant.edit',compact('data'));
    }
    public function postEditVariant(Request $r,$id)
    {
        foreach($r->variant as $key=>$value){
            $vari = Variant::find($key);
            $vari->price = $value;
            $vari->save();
        }
        return redirect('admin/product')->with('thongbao','them sp thanh cong');
    }
    public function DelVariant($id)
    {
        $vari = Variant::find($id)->delete();
        return redirect()->back();
        
    }
    
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Options;
class OptionsController extends Controller
{
    //
  
    public function getMenu()
    {
        $options = Options::where('key', '=', 'menu')->first();
        if (!empty($options->value)) {
        $json = json_decode($options->value);
        
        $showMenu = $this->show_menu($json);
       
        } else {
        $showMenu = '';
    }
    
    return view('admin.options.menu', compact('showMenu'));
    }
    public function show_menu($arr_menu, $result = '')
    {
       
        if ($arr_menu) {
        $result .= '<ol class="dd-list">';
        foreach ($arr_menu as $key => $item) {
            $item = get_object_vars($item);
            $name = $item['name'];
            $link = $item['link'];
            $result .= '<li class="dd-item" data-link="' . $link . '" data-name="' . $name . '">';
            $result .= '<div class="dd-handle" style="padding:6px 150px;">' . $name . '</div>';
        if (array_key_exists("children", $item)) {
            $result = $this->show_menu($item["children"], $result);
        }
            $result .= '<div class="menu-actions"><a href="#modal-menu" class="edit-menu modal-with-form"><i class="fa fa-edit"></i></a><a href="#" class="remove-menu"><i id="rmv-menu" class="fa fa-times"></i></a></div></li>';
        }
            $result .= '</ol>';
        }
       
        return $result;
    }
    public function postMenu(Request $r)
    {
        $options = Options::where('key', '=', 'menu')->first();
        
        $value = json_decode($options->value);
        
        $new_item = array(
            "name" => $r->menu_name,
            "link" => $r->menu_link,
        );
        
        $new_item = (object) $new_item;
        
        $value[] = $new_item;
        
        $options->value = json_encode($value);
        $options->save();
        return redirect()->back()->with('add-menu-success', 'Thêm menu thành công!');
    }
    public function postUpdateMenu(Request $r)
    {
    // menu_content
    $options = Options::where('key', '=', 'menu')->first();
    $options->value = $r->menu_content;
    $options->save();   
    return redirect()->back()->with('update-menu-success', 'Thêm menu thành công!');
    }

}

<?php 
function showError($errors,$nameInput){
    if ($errors->has($nameInput)){
        echo '<div style="border: 1px solid red;width:400px;heigh:100px;background:#F08080;opacity:.5;color:black" class="alert ">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
 }
}
function GetCategory($category,$parent,$shift,$id_select){
	foreach($category as $value){
	if($value['parent'] == $parent){
		
		if($value['id'] == $id_select){
			echo '<option value='.$value['id'].' selected>'.$shift.$value['name'].'</option>';
		}
		else{
			echo '<option value='.$value['id'].'>'.$shift.$value['name'].'</option>';
		}
		
		GetCategory($category,$value['id'],$shift."----|",$id_select);
		}
	}
}
function ShowCategory($category,$parent,$shift){
	foreach($category as $value){
	if($value['parent'] == $parent){
        echo '
        <div class="item-menu"><span>'.$shift.$value['name'].'</span>
        <div class="category-fix">
            <a class="btn-category btn-primary" href="/admin/category/edit/'.$value['id'].'"><i class="fa fa-edit"></i></a>
            <a class="btn-category btn-danger" href="/admin/category/del/'.$value['id'].'"><i class="fas fa-times"></i></i></a>
        </div>
        </div>';
		ShowCategory($category,$value['id'],$shift."----|");
		}
	}
}
//
function GetLevel($category,$parent,$count){
	foreach($category as $value){
		if($value['id'] == $parent){
			$count++;
				if($value['parent'] == 0){
					return $count;	
				}
				return GetLevel($category,$value['parent'],$count);
					
				
		}
	}
}

?>

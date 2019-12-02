<?php 
function showError($errors,$nameInput){
    if ($errors->has($nameInput)){
        echo '<div style="border: 1px solid red;width:400px;heigh:100px;background:#F08080;opacity:.5;color:black" class="alert ">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
 }
}
function GetCategory($category,$parent_id,$shift,$id_select){
	foreach($category as $value){
	if($value['parent_id'] == $parent_id){
		
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
function ShowCategory($category,$parent_id,$shift){
	foreach($category as $value){
	if($value['parent_id'] == $parent_id){
		echo '
		<ol class="dd-list">
		<li class="dd-item" data-link="" data-name="' .$shift.$value['name']. '">
		<div class="dd-handle" style="padding:6px 50px;">' .$shift.$value['name']. '</div>
		<div class="menu-actions"><a href="/admin/category/edit/'.$value['id']. '" class="edit-menu modal-with-form"><i class="fa fa-edit"></i></a><a href="/admin/category/del/'.$value['id']. '" class="remove-menu"><i id="rmv-menu" class="fa fa-times"></i></a></div></li>
		</ol>';
		ShowCategory($category,$value['id'],$shift."----|");
		}
	}
}
//
function getLevel($danhMuc,$idCha,$cap)
{
	foreach($danhMuc as $banGhi)
	{
		if($banGhi['id']==$idCha)
		{

			$cap++;

			if($banGhi['parent']==0)
			{
				return $cap;
			}

			return getLevel($danhMuc,$banGhi['parent'],$cap);

		}

	}

}

?>

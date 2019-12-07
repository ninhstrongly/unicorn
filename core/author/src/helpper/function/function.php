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
function ShowCategory($category, $parent, $shift)
{
    foreach ($category as $value) {
        if ($value['parent_id'] == $parent) {
            echo '
        <tr>
            <td>'.$shift.$value['name'].'</td>
                <td>
                <a href="/admin/category/edit/'.$value['id'].'" class="btn btn-warning" >Edit</a>
                <a href="/admin/category/del/'.$value['id'].'" class="btn btn-danger" role="button">Del</a>
                </td>
            </td>
        </tr>';
            ShowCategory($category, $value['id'], $shift.'----|');
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
//get_variant gộp các biến thể lại
function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}
// kiểm tra biến thể có tồn tại trong sản phẩm hay không
function check_value($product,$value_check)
{
	
	foreach ($product->values as $value) {
		if($value->id==$value_check)
		{
			return true;
		}
	}
	return false;

}
// Kiểm tra biến thể đã có trong sản phẩm hay chưa
function check_var($product,$array)
{
	
	foreach($product->variant as $row){
		$mang = [];
		foreach($row->values as $value){
			$mang[] = $value->id;
		}
		
		if(array_diff($mang,$array)==null){
			return false;
		}
	}
	return true;
}


?>

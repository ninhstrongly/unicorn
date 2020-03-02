<?php
function share_location_category($location)
{
    $count = App\Models\ShopeeCategory::count();
    $divi = round($count/20);
    for($i = 1; $i <= 20 ; $i++){
        $arr[$i]['start'] = ($i - 1) * $divi;
        $arr[$i]['end']   = $i * $divi;
    }
    return $arr[$location];
}

function insert_shop_auto($shop_id,$item_id,$id_category)
{
    //swap id to name shop
    $name_shop = save_name_shop($shop_id);


    // add id_shop to array => check array => insert or update
    $arr['key'][]  = '02121999';
    $arr['key'][] = $item_id;

    // insert record to shop
    $data = new App\Models\ShopeeShop;
    $data->id = $shop_id;
    $data->name_shop = $name_shop;
    $data->arr_prd = json_encode($arr);
    $data->save();

    $curl_item = curl_init();
    $url_item = 'https://shopee.vn/api/v2/item/get?itemid='.$item_id.'&shopid='.$shop_id.'';

    curl_setopt($curl_item, CURLOPT_URL, $url_item);
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    curl_setopt($curl_item, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_item, CURLOPT_USERAGENT, $agent);
    $result_item = curl_exec($curl_item);
    curl_close($curl_item);

    $result_item = json_decode($result_item, true);

    // insert record to product
    insert_product_auto($item_id,$result_item['item']['name'],$result_item['item']['price_min']/100000,$result_item['item']['historical_sold'],$result_item['item']['stock'],$result_item['item']['models'],$shop_id,$id_category,$result_item['item']['images'],$result_item['item']['categories'][2]['catid'],$result_item['item']['description']);
}
function update_shop_auto($shop_id,$item_id,$id_category)
{
    // find record to check
    $data = App\Models\ShopeeShop::find($shop_id);
    $check = json_decode($data->arr_prd,true);

    // curl data product
    $curl_item = curl_init();
    $url_item = 'https://shopee.vn/api/v2/item/get?itemid='.$item_id.'&shopid='.$shop_id.'';
    curl_setopt($curl_item, CURLOPT_URL, $url_item);
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    curl_setopt($curl_item, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_item, CURLOPT_USERAGENT, $agent);
    $result_item = curl_exec($curl_item);
    curl_close($curl_item);
    $result_item = json_decode($result_item, true);

    // check item isset in array (if isset => update) or => insert
    if(in_array($item_id,$check['key'])){
        update_product_auto($item_id,$shop_id,$result_item['item']['historical_sold'],$result_item['item']['stock'],$result_item['item']['models'],$id_category,$result_item['item']['images'],$result_item['item']['categories'][2]['catid'],$result_item['item']['description']);
    }else{
        $check['key'][] = $item_id;
        $data->arr_prd = json_encode($check);
        $data->save();

        insert_product_auto($item_id,$result_item['item']['name'],$result_item['item']['price_min']/100000,$result_item['item']['historical_sold'],$result_item['item']['stock'],$result_item['item']['models'],$shop_id,$id_category,$result_item['item']['images'],$result_item['item']['categories'][2]['catid'],$result_item['item']['description']);
    }

}
function insert_product_auto($id_prd_1,$name_prd,$price_prd,$qtt_prd,$stock_prd,$model_prd,$shop_id,$id_category,$image,$id_industry,$description)
{
    // insert into product
    Illuminate\Support\Facades\DB::table('shopee_product')->insert(
        [
            'id_prd' => $id_prd_1,
            'id_industry' => $id_industry,
            'description'=>$description,
            'name' => $name_prd,
            'price' => $price_prd,
            'sell_qtt' => $qtt_prd,
            'stock_qtt' => $stock_prd,
            'variant' => json_encode($model_prd),
            'id_shop' => $shop_id,
            'image' => json_encode($image)
        ]
    );
}
function update_product_auto($item_id,$shop_id,$qtt_prd,$stock_prd,$model_prd,$id_category,$image,$id_industry,$description)
{
    // update into product
    Illuminate\Support\Facades\DB::table('shopee_product')->where('id_prd',$item_id)->where('id_shop',$shop_id)->update(
        [
            'sell_qtt' => $qtt_prd,
            'stock_qtt' => $stock_prd,
            'variant'=> json_encode($model_prd),
            'image' => json_encode($image)
        ]
    );
}
function save_name_shop($id){
    $curl_item = curl_init();
    $url_item = 'https://shopee.vn/api/v2/shop/get?is_brief=1&shopid='.$id.'';

    curl_setopt($curl_item, CURLOPT_URL, $url_item);
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    curl_setopt($curl_item, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_item, CURLOPT_USERAGENT, $agent);
    $result_item = curl_exec($curl_item);
    curl_close($curl_item);

    $result_item = json_decode($result_item, true);
    return $result_item['data']['account']['username'];
}
function time_crontab($name){
    $time = App\Models\Time_run_crontab::where('name',$name)->where('status',1)->value('time');
    return $time;
}
?>

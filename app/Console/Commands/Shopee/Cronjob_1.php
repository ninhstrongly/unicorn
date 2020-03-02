<?php

namespace App\Console\Commands\Shopee;

use Illuminate\Console\Command;
use App\Models\{ShopeeCategory,ShopeeProduct,ShopeeShop};
use Illuminate\Support\Facades\DB;
class Cronjob_1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopee:cronjob1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(0);
        $location = share_location_category(1);

        $arr = ShopeeCategory::offset($location['start'])->limit(($location['end'] - $location['start']))->pluck('id');

        if(!empty($arr)){
            foreach ($arr as $key => $id_cate) {

                $check_status = ShopeeCategory::find($id_cate);

                if($check_status->status == 0){
                    $flag = true;
                    $page = 0;
                    while($flag){
                        $curl_item = curl_init();
                        $url_item = 'https://shopee.vn/api/v1/search_items/?by=relevancy&limit=50&match_id='.$id_cate.'&newest='.$page.'&order=desc&page_type=search&version=1';

                        curl_setopt($curl_item, CURLOPT_URL, $url_item);
                        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
                        curl_setopt($curl_item, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl_item, CURLOPT_USERAGENT, $agent);
                        $result_item = curl_exec($curl_item);
                        curl_close($curl_item);

                        $result_item = json_decode($result_item, true);

                        if(!empty($result_item['items'])){
                            foreach ($result_item['items'] as $key => $value) {

                                $check_isset_shop = ShopeeShop::where('id',$value['shopid'])->exists();

                                if($check_isset_shop){
                                    update_shop_auto($value['shopid'],$value['itemid'],$id_cate);
                                }else{
                                    insert_shop_auto($value['shopid'],$value['itemid'],$id_cate);
                                }
                            }
                            $page += 50;
                        }else{
                            DB::table('category')->where('id_cate',$id_cate)->update(['status'=>1]);
                            $flag = false;
                        }
                    }
                }
            }
        }
    }
}

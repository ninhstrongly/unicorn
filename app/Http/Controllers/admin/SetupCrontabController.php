<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time_run_crontab;
class SetupCrontabController extends Controller
{
    public function index()
    {
        $data = Time_run_crontab::all();
        return view('admin.setup.index',compact('data'));
    }
    public function getShopee()
    {
        return view('admin.setup.shopee');
    }
    public function saveShopee(Request $r)
    {
        if(!empty($r->value)){
            $time = $r->value;
            $check = Time_run_crontab::exists('name','shopee');
            if($check){
                $save = Time_run_crontab::where('name','shopee')->update(['time'=>$time]);
            }
            else{
                $save = Time_run_crontab::create([
                    'name'=>'shopee',
                    'time' => $time,
                    'status' => 0
                ]);
            }
        }
        return redirect('admin/setup_crontab');
    }
    public function change_status(Request $r)
    {
        $id = $r->id;
        if(!empty($id)){
            $data = Time_run_crontab::find($id);
            if($data->status == 1){
                Time_run_crontab::where('id',$id)->update(['status'=>0]);
            }else{
                Time_run_crontab::where('id',$id)->update(['status'=>1]);
                echo 1;
            }
        }
    }
}

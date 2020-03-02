<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopeeProduct;
class TestController extends Controller
{
    public function test()
    {
        dd(time_crontab('shopee'));
    }
}

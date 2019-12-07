<?php
namespace Unicorn\Author\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Users;
use DB;


class IndexController extends Controller
{
    public function getIndex()
    {
        //Weather
        $weather['name'] = $this->getWeather()->name;
        $weather['temp'] = $this->getWeather()->main->temp;
        $weather['temp-min'] = $this->getWeather()->main->temp_min;
        $weather['temp-max'] = $this->getWeather()->main->temp_max;
        $currentTime = time();
        $time =  date("l g:i a", $currentTime);
        $date =  date("jS F, Y", $currentTime);
        $weather['time'] = $time;
        $weather['date'] = $date;
        $weather['icon'] = $this->getWeather()->weather[0]->icon;
       
        return view('author::admin.home.index',compact('weather'));
    }
    public function getWeather()
    {
        $apiKey = "cbf0c8fd8d05d058bf54c5311667270e";
        $cityId = "1581130";
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $data = json_decode($response);
        $currentTime = time();

        return $data;
    }
}
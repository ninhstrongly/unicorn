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
        return view('author::admin.home.index');
    }
}
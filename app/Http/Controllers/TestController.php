<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {
        echo phpinfo();
        // $list = DB::table('technologies')->get();
        // dd($list);
    }
}

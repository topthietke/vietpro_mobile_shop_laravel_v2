<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __contruct()
    {
        $this ->DangNhap();
    }
    function DangNhap()
    {
        if(Auth::check())
        {
            view()->share('user_login',Auth::User());
        }
    }
    public function Home()
    {
        return view('Page.Master.master');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    //
    public function getList()
    {
        return view('Admin.Ads.list_ads');
    }
    public function getEdit()
    {
        return view('Admin.Product.edit_user');
    }
    
    public function getAdd()
    {
        return view('Admin.Product.add_user');
    }
}

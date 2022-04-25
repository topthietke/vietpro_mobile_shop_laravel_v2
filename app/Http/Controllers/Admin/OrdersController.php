<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orders;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductsRequest;
use App\Imports\ProductImport;
use App\Exports\ProductExport;

use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Product\ProductRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function getList(){
        $orders = Orders::paginate(5);
        // // $custommer = Customers::all();
        // foreach ($orders as $key => $item) {
        //     dd($item->Customers->cus_name);
        // }

        return view('Admin.Orders.list',compact('orders'));
    }
}

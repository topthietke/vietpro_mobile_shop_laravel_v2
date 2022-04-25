<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
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
use App\Models\Product;
use App\Models\Category;
use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Product\ProductRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
// -----------------------------------------------------------------------------
// Begin show list product
    public function getList()
    {
        $data['products'] = Products::paginate(5);
        return view('Admin.Product.list',$data);
    }
// End show list product
// -----------------------------------------------------------------------------
// Hàm kiểm tra tồn tại của file
// Begin edit product in input
    public function getEdit($id)
    {
        $products = Products::where('id',$id)->first();
        $cat_id = $products -> catid;
        $categories = Categories::all();
        return view('Admin.Product.edit_product',compact('products','categories','cat_id'));
    }

    public function postEdit(EditProductsRequest $request,$id){

        $product = Products::find($id);
        //Khai báo biến file ảnh
        // Kiểm tra người dùng có thay đổi ảnh không nếu thay đổi thì gắn bằng thẻ input
        if($request -> prd_image == null){
            //Không thay ảnh sản phẩm thì lấy thông tin trên db
            $products = Products::find($id);
            $fileName = $products -> image;

        }
        else{
        //Xóa ảnh cũ
        // ---------------------------------------------------------------------
            //Lấy lại tên ảnh cũ để xóa
            $product = Products::find($id);
            //Khai báo đường dẫn ảnh
            $url = public_path().'/Admin/img/Products';
            //Khai báo biến ảnh cũ
            $old_img = $url.'/'.$product->image;
            //Kiểm tra tồn và thực hiện xóa ảnh
            if(file_exists($old_img)==true) unlink($old_img);
        // Kết thúc xóa ảnh cũ
        // ---------------------------------------------------------------------

        //Khai báo ảnh mới
            $new_img = $request -> prd_image;
        // có thể lấy file name theo $_FILES['prd_image']['type'];
            $type = $new_img->getClientOriginalExtension();
        //Lấy tên file ảnh
            $fileName = $new_img -> getclientoriginalname();
        //Tạo đường dẫn upfile ảnh
             $url = public_path().'/Admin/img/Products';
        // Kiểm tra file đã có hay chưa nếu chưa có thì upload, còn nếu có rồi thì sửa lại tên file
            $pathFile= $url .'/'. $fileName;
        if(file_exists($pathFile)==true){
        return redirect()->route('Product.Add')->with('thongbao', 'Ảnh sản phẩm đã tồn tại! Vui lòng đổi tên ảnh');
        }
        else {

        // Upload ảnh lên server
        $new_img->move($url, $fileName);
        }

        // ---------------------------------------------------------------------
        }
        $products = Products::find($id);
        $products->catid = $request ->cat_name;
        $products->name = $request->prd_name;
        $products->code  = $request->prd_code;
        $products->promotion  = $request->prd_promotion;
        $products->image  = $fileName;
        $products->price  = $request->prd_price;
        $products->accessories  = $request->prd_accessories;
        $products->warrnty  = $request->prd_warranty;
        $products->slug  = Str::slug($request->prd_name,'-');
        $products->new  = $request->prd_new;
        $products->status  = $request->prd_status;
        $products->featured  =$request->prd_featured;
        $products->details = $request->prd_details;
        $products-> updated_at =  new Datetime();
        $products->save();
        return redirect()->route('Product.List')->with('thongbao', 'Sản phẩm đã được đã được cập nhật!');

    }

// End edit product in input
// -----------------------------------------------------------------------------
// Begin add new product
    public function getAdd()
    {
        $data['categories'] = Categories::all();
        return view('Admin.Product.add_product',$data);
    }
    public function postStore(AddProductRequest $request)
    {
    //Bắt đầu kiểm tra tồn tại của file

            if($request->hasFile('prd_image')){
                //Khai báo file
                $file = $request->prd_image;

                //Lấy định dạng file ảnh *.png, *<div class="jpg">  </div>
                // có thể lấy file name theo $_FILES['prd_image']['type'];
                $type = $file->getClientOriginalExtension();

                //Lấy tên file ảnh
                // có thể lấy file name theo $_FILES['prd_image']['name'];
                $fileName = $file -> getclientoriginalname();

                //Tạo đường dẫn upfile ảnh
                $url = public_path().'/Admin/img/Products';

                // Kiểm tra file đã có hay chưa nếu chưa có thì upload, còn nếu có rồi thì sửa lại tên file
                $pathFile= $url .'/'. $fileName;
                $check = file_exists($pathFile);
                if(file_exists($pathFile)==true){
                return redirect()->route('Product.Add')->with('thongbao', 'Ảnh sản phẩm đã tồn tại! Vui lòng đổi tên ảnh');
                }
                else {

                // Upload ảnh lên server
                $file->move($url, $fileName);
                }
            }
            else{
                $image = 'download.jpeg';
            }

    //Kết thúc kiểm tra tồn tại

        $cat_id = $request ->cat_name;
        $prd_name = $request->prd_name;
        $prd_code  = $request->prd_code;
        $prd_promotion  = $request->prd_promotion;
        $prd_accessories  = $request->prd_accessories;
        $prd_image  = $fileName;
        $prd_price  = $request->prd_price;
        $prd_warrnty  = $request->prd_warranty;
        $prd_slug  = Str::slug($request->prd_name,'-');
        $prd_new  = $request->prd_new;
        $prd_status  = $request->prd_status;
        $prd_featured  = $request->prd_featured;
        $prd_details  = $request->prd_details;

        // $prd_created_at = new Datetime();

        //Kiểm tra tồn tại của tên sản phẩm
        $check = Products::where('name', $prd_name)
        ->orwhere('code',$prd_code)
        ->first();

        if(!$check){
            $products = new Products();
            $products-> name = $prd_name;
            $products-> catid = $cat_id;
            $products-> code = $prd_code;
            $products-> promotion = $prd_promotion;
            $products-> accessories = $prd_accessories;
            $products-> image = $prd_image;
            $products-> price = $prd_price;
            $products-> warrnty = $prd_warrnty;
            $products-> slug = $prd_slug;
            $products-> new = $prd_new;
            $products-> status = $prd_status;
            $products-> featured = $prd_featured;
            $products-> details = $prd_details;
            $products-> created_at =  new Datetime();
            $products -> save();
            return redirect()->route('Product.List')->with('thongbao', 'Sản phẩm đã được thêm mới!');
        }
        else{
            return redirect()->route('Product.Add')->with('thongbao', 'Tên sản phẩm đã tồn tại!');
        }



        //return redirect()->route('Product.List')->with('success','Thêm sản phẩm thành công');
    }
// End list product in input
// -----------------------------------------------------------------------------
// Begin Delete Product
    public function getDelete($id){

        $products = Products::find($id);
        $fileName = public_path().'/Admin/img/Products'.'/'. $products->image;
        unlink($fileName);
        $products->delete();
        return redirect()->route('Product.List')->with('thongbao', 'Sản phẩm đã được xóa!');
    }
// End Delete Product
// -----------------------------------------------------------------------------
// Bắt đầu khu vực chèn danh sách từ file excel
    public function getImport()
    {
        return view('Admin.Product.import');
    }
    public function postImport(){
        Excel::import(new ProductImport,request()->file('file'));
        return redirect()->route('Product.List')->with('thongbao', 'Chèn danh sách sản phẩm thành công');
    }
    public function getExport()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

// Kết thúc khu vực chèn danh sách từ file excel

}

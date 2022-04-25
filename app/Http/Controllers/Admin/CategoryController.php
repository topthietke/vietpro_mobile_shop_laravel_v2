<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Imports\CategoryImport;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
class CategoryController extends Controller
{
//-----------------------------------------------------------------------
//Tải danh mục
    public function getList()
    {
        $data['Categories'] = Categories::paginate(5);
        return view('Admin.Category.list',$data);
    }
//Kết thúc tải danh mục
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
//Sửa thông tin danh mục
    public function getEdit($id)
      {
            $data['Categories'] = Categories::find($id);
            return view('Admin.Category.edit_category',$data);
      }

      public function postEdit(EditCategoryRequest $request,$id)
      {
        $cat_name = $request -> cat_name;
        $category_slug = Str::slug($cat_name,'-');
        $Categories = Categories::find($id);
        if($Categories ){
            $Categories->name = $cat_name;
            $Categories->slug = $category_slug;
            $Categories->created_at = new DateTime();
            $Categories->save();
            return redirect()->route('Category.List')->with('thongbao', 'Danh mục đã được cập nhật');
        }
      }
//Kết thúc sửa thông tin danh mục
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
//Thêm mới danh mục
    public function getAdd()
    {
        return view('Admin.Category.add_category');
    }

    public function postAdd(AddCategoryRequest $request){
        $cat_name = $request -> cat_name;
        $category_slug = Str::slug($cat_name,'-');
        $Categories = Categories::where('name',$cat_name)->first();
        if($Categories ){
            return redirect()->back()->with('thongbao', 'Danh mục đã tồn tại');
        }
        else
        {
            $Categories = new Categories;
            $Categories->name = $cat_name;
            $Categories->slug = $category_slug;
            $Categories->created_at = new DateTime();
            $Categories->save();
            return redirect()->route('Category.List')->with('thongbao', 'Danh mục đã được thêm mới');
        }
    }
// Kết thúc Thêm mới danh mục
//-----------------------------------------------------------------------
//Bắt đầu khu vực import danh mục
    public function getImport(){
        return view('Admin.Category.Import');
    }
    public function postImport(){
        Excel::import(new CategoryImport,request()->file('file'));           
        return redirect()->route('Category.List')->with('thongbao', 'Chèn danh sách danh mục thành công');
    }
    public function getExport()
    {
        return Excel::download(new CategoryExport, 'Category.xlsx');
    }   
//Kết thúc khu vực import danh mục
//-----------------------------------------------------------------------
//Xóa danh mục
    public function getDelete($id)
    {
        //Kiểm tra mã danh mục có tồn tại ở bảng khác không
        $products = Products::where('catid',$id)->first();
        if($products){
            return redirect()->back()->with('thongbao', 'Danh mục này không thể xóa! Do đang tồn tại ở bảng khác');   
        }
        else{
        $del = Categories::find($id);
        $del->delete($id);
        // $del -> save();
        return redirect()->route('Category.List')->with('thongbao', 'Danh mục đã được xóa bỏ');
        }


       
    }

//Kết thúc xóa danh mục
//-----------------------------------------------------------------------
}

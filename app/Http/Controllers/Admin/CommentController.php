<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Custommers;
use App\Models\Products;
use App\Imports\CommentsImport;
use App\Exports\CommentsExport;
use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\EditCommentsRequest;
use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
class CommentController extends Controller
{
// ------------------------------------------------------------------------------------
// Bắt đầu tải danh sách
    //
    public function getList()
    {
        $data['comments'] = Comments::paginate(5);
        return view('Admin.Comment.comment',$data);
    }
// Kết thúc tải danh sách
// ------------------------------------------------------------------------------------
// Cập nhật comment
    public function getEdit($id)
    {
        $comments = Comments::where('id',$id)->first();
        $cus_id = $comments -> cusid;
        $prd_id = $comments -> prdid;
        $products = Products::all();
        $custommers = Customers::all();
        return view('Admin.Comment.edit',compact('comments','cus_id','prd_id','custommers','products','id'));
    }
    public function postEdit(EditCommentsRequest $request,$id)
    {

        $cus_id = $request->cus_id;
        $prd_id = $request->prd_id;
        $com_detail= $request->com_detail;
        $com_status = $request->com_status;

        $comments = Comments::find($id);
        $comments -> cusid = $cus_id;
        $comments -> prdid = $prd_id;
        $comments -> com_detail = $com_detail;
        $comments -> com_status = $com_status;
        $comments -> save();
        return redirect()->route('Comment.List')->with('thongbao', 'Bình luận đã được cập nhật!');

    }
// ------------------------------------------------------------------------------------
// Bắt đầu thêm mới comment
    public function getAdd()
    {
        $data['comments'] = Comments::all();
        $data['custommers'] = Customers::all();
        $data['products'] = Products::all();
        return view('Admin.Comment.add',$data);
    }
    public function postAdd(AddCommentRequest $request){
        $cus_id = $request->cus_id;
        $prd_id = $request->prd_id;
        $com_detail= $request->com_detail;
        $com_status = $request->com_status;

        $comments = new Comments();
        $comments -> cusid = $cus_id;
        $comments -> prdid = $prd_id;
        $comments -> com_detail = $com_detail;
        $comments -> com_status = $com_status;
        $comments -> save();
        return redirect()->route('Comment.List')->with('thongbao', 'Bình luận đã được thêm mới!');
    }
// Kết thúc thêm mới commnet
// ------------------------------------------------------------------------------------
// Bắt đầu import và export commnet
    public function getImport()
    {
        return view('Admin.Comment.import');
    }
    public function postImport()
    {
        Excel::import(new CommentsImport,request()->file('file'));
        return redirect()->route('Comment.List')->with('thongbao', 'Chèn danh sách bình luận thành công');
    }
    public function Export(){
        return Excel::download(new CommentsExport, 'Comments.xlsx');
    }
// Kết thúc import và export commnet
// ------------------------------------------------------------------------------------
// Bắt đầu Delete comment
    public function getDelete($id)
    {
        $comments = Comments::find($id);
        $comments->delete();
        return redirect()->route('Comment.List')->with('thongbao', 'Bình luận đã được xóa!');
    }
// Bắt đầu Delete comment
}

<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Controller@Home')->name('Home');

// ---------------------------------------------------------------------------------------
// Bắt đầu group Quản trị hệ thống
    Route::group(['prefix' => 'Admin'], function () {       
    // Đăng nhập hệ thống CSDL
        Route::get('/', 'Auth\LoginController@getLogin')->name('Admin.Login');
        Route::post('/', 'Auth\LoginController@postLogin');
    // Reset mật khẩu trường hợp quên mật khẩu
        Route::get('/Forgot','Auth\ForgotPasswordController@getForgot')->name('Admin.Forgot');
        Route::post('/Forgot','Auth\ForgotPasswordController@postForgot');
    // Đăng xuất hệ thống
        Route::get('/Logout','Admin\UserController@getLogout') -> name('Admin.Logout');
    // Đăng nhập hệ thống bằng tài khoản google api
        Route::get('/google-login','Auth\LoginController@getGoogle')->name('Admin.Google');
        Route::get('/google', 'Auth\LoginController@redirectToGoogle');
        Route::get('/google/callback', 'Auth\LoginController@handleGoogleCallback');

    // Đăng nhập hệ thống bằng tài khoản
        Route::get('/facebook-login', 'Auth\LoginController@getFacebook')->name('Admin.Facebook');
        Route::get('/facebook/callback', 'Auth\LoginController@getCallback');
    // Trang chủ
        Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('Admin.dashboard');
    // Phần User
        Route::group(['prefix' => 'User'], function () {
            //Danh sách thành viên
            Route::get('/','Admin\UserController@getList')->name('User.List');
            // Thêm thành viên
            Route::get('/Add','Admin\UserController@getAdd')->name('User.Add');
            Route::post('/Add','Admin\UserController@postAdd');
            //Import danh sach
            Route::get('/Import','Admin\UserController@getImport')->name('User.Import');
            Route::post('/Import','Admin\UserController@postImport');
            Route::get('/Export','Admin\UserController@getExport')->name('User.Export');
            //Sửa thành viên
            Route::get('/Edit/{id}','Admin\UserController@getEdit')->name('User.Edit');
            Route::post('/Edit/{id}','Admin\UserController@postEdit');
            //Xóa thành viên
            Route::get('/Delete/{id}','Admin\UserController@getDelete')->name('User.Delete');
            //Reset mật khẩu khi admin reset mật khẩu
            Route::get('/Reset/{id}','Admin\UserController@getReset')->name('User.Reset');
            Route::post('/Reset/{id}','Admin\UserController@postReset');
            //Thông tin người dùng
            Route::get('/Profile/{id}','Admin\UserController@getProfile') -> name('User.Profile');

         });
    // Phần danh mục
        Route::group(['prefix' => 'Category'], function () {
            Route::get('/','Admin\CategoryController@getList')->name('Category.List');
            // Thêm thông tin
            Route::get('/Add','Admin\CategoryController@getAdd')->name('Category.Add');
            Route::post('/Add','Admin\CategoryController@postAdd');
            //Import và Export File excel
            Route::get('/Import','Admin\CategoryController@getImport')->name('Category.Import');
            Route::post('/Import','Admin\CategoryController@postImport');
            Route::get('/Export','Admin\CategoryController@getExport')->name('Category.Export');
            // Sửa thông tin
            Route::get('/Edit/{id}','Admin\CategoryController@getEdit')->name('Category.Edit');
            Route::post('/Edit/{id}','Admin\CategoryController@postEdit');
            // Xóa thông tin
            Route::get('/Delete/{id}','Admin\CategoryController@getDelete')->name('Category.Delete');

        });
    // Phần sản phẩm
        Route::group(['prefix' => 'Product'], function () {
        // Tải danh sách khách hàng
        Route::get('/','Admin\ProductController@getList')->name('Product.List');
        // Thêm mới khách hàng - Lưu ý: Để khách hàng tự đăng ký
        Route::get('/Add','Admin\ProductController@getAdd')->name('Product.Add');
        Route::post('/Store','Admin\ProductController@postStore')->name('Product.Store');
        // Cập nhật thông tin khách hàng
        Route::get('/Edit/{id}','Admin\ProductController@getEdit')->name('Product.Edit');
        Route::post('/Update/{id}','Admin\ProductController@postEdit')->name('Product.Update');
        // Xóa khách hàng thông tin khách hàng - Lưu ý: Xem xét lại nên có xóa hay không hay để trạng thái không sử dụng
        Route::get('/Delete/{id}','Admin\ProductController@getDelete')->name('Product.Delete');
        //Chèn danh sách khách hàng hoặc xuất danh sách khách hàng
        Route::get('/Import','Admin\ProductController@getImport')->name('Product.Import');
        Route::post('/Import','Admin\ProductController@postImport')->name('Product.Store');
        Route::get('/Export','Admin\ProductController@getExport')->name('Product.Export');
        });
    // Phần khách hàng
        Route::group(['prefix' => 'Customers'], function () {
        // Tải danh sách sản phẩm
        Route::get('/','Admin\CustomersController@getList')->name('Customers.List');
        // Thêm mới sản phẩm
        Route::get('/Add','Admin\CustomersController@getAdd')->name('Customers.Add');
        Route::post('/Add','Admin\CustomersController@postAdd');
        // Sửa sản phẩm
        Route::get('/Edit/{id}','Admin\CustomersController@getEdit')->name('Customers.Edit');
        Route::post('/Update/{id}','Admin\CustomersController@Update')->name('Customers.Update');
        // Xóa sản phẩm
        Route::get('/Delete/{id}','Admin\CustomersController@getDelete')->name('Customers.Delete');
        //Import danh sách sản phẩm vào db
        Route::get('/Import','Admin\CustomersController@getImport')->name('Customers.Import');
        Route::post('/Import','Admin\CustomersController@postImport')->name('Customers.Store');
        Route::get('/Export','Admin\CustomersController@getExport')->name('Customers.Export');
        //Reset mật khẩu cho khách hàng
        Route::get('/Reset/{id}','Admin\CustomersController@getReset')->name('Customers.Reset');
        Route::post('/Reset/{id}','Admin\CustomersController@postReset');
        });
    // Phần comment
        Route::group(['prefix' => 'Comment'], function () {
        // Phần load danh sách
            Route::get('/','Admin\CommentController@getList')->name('Comment.List');

        // Phần thêm bình luận
            Route::get('/Add','Admin\CommentController@getAdd')->name('Comment.Add');
            Route::post('/Add','Admin\CommentController@postAdd');
        // Phần sửa bình luận
            Route::get('/Edit/{id}','Admin\CommentController@getEdit')->name('Comment.Edit');
            Route::Post('/Edit/{id}','Admin\CommentController@postEdit');
        // Phần xóa comment
        Route::get('/Delete/{id}','Admin\CommentController@getDelete')->name('Comment.Delete');
        // Phần import
            Route::get('/Import','Admin\CommentController@getImport')->name('Comment.Import');
            Route::post('/Import','Admin\CommentController@postImport');
            Route::get('/Export','Admin\CommentController@Export')->name('Comment.Export');
        });
    // Phần orders
        Route::group(['prefix' => 'Orders'], function () {
            Route::get('/','Admin\OrdersController@getList')->name('Orders.List');
            Route::get('/Add','Admin\OrdersController@getAdd')->name('Orders.Add');
            Route::get('/Edit','Admin\OrdersController@getEdit')->name('Orders.Edit');
        });
    // Phần quảng cáo
        Route::group(['prefix' => 'Ads'], function () {
            Route::get('/','Admin\AdsController@getList')->name('Ads.List');
            Route::get('/Add','Admin\AdsController@getAdd')->name('Ads.Add');
            Route::get('/Edit','Admin\AdsController@getEdit')->name('Ads.Edit');
        });
    // Phần cấu hình mail
        Route::group(['prefix' => 'Mail'], function () {
            Route::get('/','Admin\ConfigController@getConfig')->name('Mail.Config');

        });
    });
// Kết thúc group Quản trị hệ thống
// ---------------------------------------------------------------------------------------

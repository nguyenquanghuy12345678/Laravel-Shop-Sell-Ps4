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
// frontend
Route::get('/','App\Http\Controllers\HomeController@index');

Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::get('/product','App\Http\Controllers\HomeController@index1');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

// Sản phẩm theo danh mục, thương hiệu


Route::get('/danh-muc-san-pham/{slug_category_product}','App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_slug}','App\Http\Controllers\BrandProduct@show_brand_home');
// chi tiet san pham
//Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');



// endfronend


// backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_drashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');
Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');

Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');


//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');
Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');

// cau 7 brand

Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');

// cau 9. tao chuc nang them và liệt kê
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/all-product','App\Http\Controllers\ProductController@all_product');
Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');
// cau 11 sua xoa
Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');

Route::get('/chi-tiet-san-pham/{product_slug}','App\Http\Controllers\ProductController@details_product');

// cau 15 gio hang
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
// cau 16
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
// thu nghiem
// cau 17. thanh toan
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');

Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');

Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');

Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');

// cau 19
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');

Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
// cau 20
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');

// đơn hang cau21
Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{orderId}','App\Http\Controllers\CheckoutController@view_order');
// cau 22
Route::post('/update-order/{order_id}','App\Http\Controllers\CheckoutController@update_order');
// cau 23 cai dat user
Route::get('/taikhoan','App\Http\Controllers\CheckoutController@user_setting');
Route::get('/view-order-user/{orderId}','App\Http\Controllers\CheckoutController@view_order_user');

// cau 25
//Send Mail 


Route::get('/news', function () {
    return view('pages.news');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

// bo sung cau cap nhat user
///cap-nhat-user
Route::get('/cap-nhat-user','App\Http\Controllers\HomeController@get_customer');
Route::post('/update-user','App\Http\Controllers\HomeController@update_user');

Route::get('/cap-nhat-pass','App\Http\Controllers\HomeController@show_update_pass');
Route::post('/update_pass_save','App\Http\Controllers\HomeController@update_pass_saver');

// gửi email quên mật khẩu
Route::get('/show-pass','App\Http\Controllers\HomeController@show_pass');

Route::post('/send-email-customer','HomeController@sen_email_pass');
// cau 30 thong ke don hang theo ngay thang nam

Route::get('/found-order-day','App\Http\Controllers\AdminController@show_order_day');
Route::get('/found-order-month','App\Http\Controllers\AdminController@show_order_month');
Route::get('/found-order-weed','App\Http\Controllers\AdminController@show_order_week');
// multi-email
Route::get('/multi-email','App\Http\Controllers\AdminController@show_multi_email');
Route::get('/send-mail','App\Http\Controllers\AdminController@send_mail');

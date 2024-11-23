<?php

use App\Http\Controllers\CategoryProduct;
// use App\Http\Controllers\NewsController;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//  import vào



// Route::get('/', [HomeController::class, 'index']);
// Route::get('/trang-chu', [HomeController::class, 'index']);
// Route::get('/', 'App\Http\Controllers\HomeController@index');
// Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');
// Route::get('/admin', [AdminController::class, 'index']);
// Route::get('/dashboard', [AdminController::class, 'showdashboard']);
// Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
// Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
// Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);
// Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);



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
Route::get('/','HomeController@index');

Route::get('/trang-chu','HomeController@index');
Route::get('/product','HomeController@index1');
Route::post('/tim-kiem','HomeController@search');

// Sản phẩm theo danh mục, thương hiệu


Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand_home');
// chi tiet san pham
//Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');



// endfronend


// backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_drashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');


//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

// cau 7 brand

Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

// cau 9. tao chuc nang them và liệt kê
Route::get('/add-product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
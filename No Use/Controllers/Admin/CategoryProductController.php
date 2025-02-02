<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
// use DB;
// use Session; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }


    // Sửa lại hàm này
    public function all_category_product()
    {
        // $all_category_product = DB::table('tbl_category_product')->get();
        // $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        // return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục thành công');
        return Redirect::to('/add-category-product');
    }
}

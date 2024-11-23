<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Thêm dòng này
use Illuminate\Support\Facades\Session; // Thêm dòng này
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    // Hiển thị trang đăng nhập admin
    public function index() {
        return view('admin_login');
    }

    // Hiển thị dashboard
    public function show_dashboard() {
        return view('admin.dashboard');
    }

    // Xử lý đăng nhập
    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password); // Sử dụng md5 để mã hóa mật khẩu

        // Kiểm tra thông tin đăng nhập
        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        // Nếu thông tin đúng
        if ($result) {
            Session::put('admin_name', $result->admin_name); // Lưu thông tin vào session
            Session::put('admin_id', $result->admin_id);
            return view('admin.dashboard');
        } else {
            // Nếu thông tin sai
            Session::put('message', 'Mật khẩu hoặc email không đúng, nhập lại nhé');
            return Redirect::to('/admin'); // Trả về trang đăng nhập
        }
    }
}

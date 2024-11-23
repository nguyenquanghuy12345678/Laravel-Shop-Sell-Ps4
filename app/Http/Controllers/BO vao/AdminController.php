<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash ;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin');
        }
    }

    public function index() {
        return view('admin_login');
    }

    public function show_drashboard() {
        return $this->AuthLogin() ?: view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')
                    ->where('admin_email', $admin_email)
                    ->first();

        if ($result && Hash::check($admin_password, $result->admin_password)) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return view('admin.dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc email không đúng. Vui lòng thử lại!');
            return Redirect::to('/admin');
        }
    }

    public function logout() {
        Session::forget(['admin_name', 'admin_id']);
        return Redirect::to('/admin');
    }

    public function show_order_day(Request $request) {
        $date = Carbon::createFromFormat('d-m-Y', "{$request->day}-{$request->month}-{$request->year}");
        $all_order = DB::table('tbl_order')->whereDate('created_at', $date->format('Y-m-d'))->get();
        return view('admin.day_order')->with('all_order', $all_order);
    }

    public function show_multi_email() {
        return view('admin.multi_email');
    }

    public function send_mail(Request $request) {
        $to_name = "ngolequanit";
        $to_email = [$request->email_account1, $request->email_account2];

        $data = [
            "name" => "Mail từ tài khoản Khách hàng",
            "body" => "Mail gửi về vấn đề hàng hóa"
        ];

        try {
            Mail::send('admin.multi_email', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Kiểm tra thử gửi mail Google');
                $message->from('youremail@example.com', $to_name);
            });
            return view('admin.multi_email')->with('name', $to_name);
        } catch (\Exception $e) {
            return back()->with('error', 'Gửi email thất bại: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();
    
        // Kiểm tra nếu người dùng tồn tại
        if ($user) {
            // Lấy thông tin full_name và email của người dùng
            $full_name = $user->full_name;
            $email = $user->email;
    
            // Gắn thông tin full_name và email vào biến $data
            $data = "Full Name: $full_name, Email: $email";
    
            // Tạo mã QR code từ dữ liệu
            $qrCode = QrCode::generate($data);
    
            // Trả về view home và truyền biến $qrCode vào view
            return view('home', compact('qrCode'));
        } else {
            // Nếu không có người dùng đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login');
        }
    }
    
}

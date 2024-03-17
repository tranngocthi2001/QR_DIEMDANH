<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //use AuthenticatesUsers;

    // Phương thức khởi tạo
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Thêm phương thức showLoginForm
    public function showLoginForm()
    {
        return view('auth.login'); // Chỉ đường dẫn đến file view chứa form đăng nhập của bạn
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Đăng nhập thành công, kiểm tra vai trò của người dùng để chuyển hướng phù hợp
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->intended('/home');
        }
    }

    // Đăng nhập thất bại, trở lại form đăng nhập với thông báo lỗi
    return back()->withErrors(['email' => 'These credentials do not match our records.'])->withInput($request->only('email'));
}

    // Phương thức xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Xóa session
        $request->session()->regenerateToken(); // Tạo lại CSRF token

        return redirect('/'); // Chuyển hướng người dùng về trang chủ hoặc trang bạn mong muốn sau khi đăng xuất
    }
    protected function authenticated(Request $request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect('/home');
}
protected function redirectTo()
{
    if (auth()->user()->role === 'admin') {
        return '/admin/dashboard';
    }

    return '/user/dashboard';
}


public function someMethod()
{
    // In ra dữ liệu người dùng hiện tại
    dd(auth()->user());

    // In ra dữ liệu session
    dd(session()->all());
}

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}

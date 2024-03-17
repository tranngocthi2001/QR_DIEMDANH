<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
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

//   Route::get('/', function () {
//      return view('welcome');
//  });


//Route::get('/users', [DataController::class, 'showUsers']);
// Route::get('/events', [DataController::class, 'showEvents']);
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

//Route::get('/user', [UserController::class, 'showUsers']);
//-------------------
// Hiển thị danh sách người dùng
//Route::resource('users', UserController::class);
Route::get('/user', [UserController::class, 'index'])->name('users.index');

// Hiển thị form thêm người dùng
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');

// Lưu người dùng mới
Route::post('/user', [UserController::class, 'store'])->name('users.store');

// Hiển thị form chỉnh sửa người dùng
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Cập nhật người dùng
Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');

// Xóa người dùng
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Route để hiển thị danh sách event
Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

Route::post('/events', [EventController::class, 'store'])->name('events.store');

//use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@register')->name('register.store');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/home', [EventController::class, 'index'])->name('events.index');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QRController;



Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route cho việc cập nhật sự kiện
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homeadmin', [HomeController::class, 'index'])->name('homeadmin');

Route::get('/admin/dashboard', 'AdminController@index')->middleware('checkRole:admin');
// routes/web.php

Route::post('/login', [LoginController::class, 'login'])->name('login');

// routes/web.php
Route::get('/homeadmin', function () {
    return view('admin.home');
})->name('home.admin')->middleware('auth');

Route::get('/events', function () {
    return view('events.index');
})->name('events')->middleware('auth');

Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('/homeadmin', function () {
        // Chỉ cho phép admin truy cập
    });
});

Route::middleware(['checkrole:user'])->group(function () {
    Route::get('/events', function () {
        // Chỉ cho phép user truy cập
    });
});
Route::get('/events', 'EventController@index')->name('events.index');
Route::get('/generate-qr', 'AttendanceController@generateQR')->name('attendance.generateQR');


Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/generate-qr-code', [QRController::class, 'generateQR'])->name('generate.qr');

// Đảm bảo đường dẫn này phản ánh đúng vị trí của LoginController trong ứng dụng của bạn.

// Định nghĩa route đăng xuất
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('is_admin'); // Giả sử bạn có middleware kiểm tra người dùng có phải là admin không
//-----
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/users/dashboard', function () {
    return view('users.dashboard');
})->name('users.dashboard');

Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['checkrole:user'])->group(function () {
    Route::get('/users/dashboard', function () {
        return view('user.dashboard');
    })->name('users.dashboard');
});

//-----admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/events', 'EventController@index')->name('admin.events.index');
    Route::get('/admin/events/create', 'EventController@create')->name('admin.events.create');
    Route::post('/admin/events', 'EventController@store')->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', 'EventController@edit')->name('admin.events.edit');
    Route::put('/admin/events/{id}', 'EventController@update')->name('admin.events.update');
    Route::delete('/admin/events/{id}', 'EventController@destroy')->name('admin.events.destroy');
});
Route::get('/admin/dashboard', [EventController::class, 'index'])->name('admin.dashboard')->middleware('is_admin');
use App\Http\Controllers\AdminController;

// Route cho trang dashboard của Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');
//ql điểm danh
use App\Http\Controllers\AttendanceController;
Route::get('/events/{eventId}/attendances', [AttendanceController::class, 'manage'])->name('attendances.manage');
// Trong routes/web.php
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
//xử lý dữ liệu quét được
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

Route::get('/admin/users', [UserController::class, 'manage'])->name('users.manage');
//--admin/user
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//dsDiemdanh
// routes/web.php
Route::get('/events/{event_id}/attendances', [AttendanceController::class, 'showByEvent'])->name('attendances.showByEvent');

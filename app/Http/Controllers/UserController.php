<?php

namespace App\Http\Controllers;

use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\User;

class UserController extends Controller
{
    
    // public function showUsers()
    // {
    //     $users = DB::table('users')->get(); // Truy vấn tất cả các người dùng từ bảng users

    //     return view('users', ['users' => $users]); // Truyền dữ liệu người dùng đến view
    // }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('users.index', compact('users'));
    // }

    
    


    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    // public function update(Request $request, User $user)
    // {
    //     // Thêm validation và logic cập nhật user ở đây
    //     $user->update($request->all());
    //     return redirect()->route('users.index');
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('users.index');
    // }

    // //----Dang ky tai khoan
    // public function create()
    // {
    //     return view('auth.register');
    // }

    // public function store(Request $request)
    // {
    //     // Validate input
    //     $validatedData = $request->validate([
    //         'username' => 'required|unique:users|max:50',
    //         'password' => 'required|min:6',
    //         'full_name' => 'required|max:100',
    //         'email' => 'required|email|unique:users|max:100',
    //         'phone_number' => 'nullable|max:20',
    //         'role' => 'required|in:user',
    //     ]);

    //     // Create user
    //     $user = User::create($validatedData);

    //     // Redirect with success message
    //     return redirect()->route('register.create')->with('success', 'User registered successfully!');
    // }
    public function manage()
    {
        // Nội dung logic để quản lý user, ví dụ lấy thông tin user từ database
        $users = User::all(); // Lấy tất cả người dùng
        return view('admin.users.manage', compact('users'));
        //return view('admin.users.manage'); // trả về view quản lý user
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Người dùng đã được xóa thành công.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Trả về view edit với dữ liệu người dùng
        return view('users.edit', compact('user'));
    }
    
}

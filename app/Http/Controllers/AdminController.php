<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::all(); // Lấy tất cả sự kiện từ database
        return view('admin.dashboard', compact('events')); // Truyền biến events sang view admin.dashboard
    }

    // Thêm các phương thức khác tại đây
}

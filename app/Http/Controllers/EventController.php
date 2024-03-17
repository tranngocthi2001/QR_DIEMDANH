<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Lấy tất cả events
        return view('admin.dashboard', compact('events')); // Truyền events đến view
    }
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required',
        ]);

        Event::create($validatedData);

        return redirect('/events/create')->with('success', 'Event created successfully!');
    }
    public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('homeadmin')->with('success', 'Sự kiện đã được xóa thành công!');
}
public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('events.edit', compact('event'));
    
}
public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);
    
    // Cập nhật thông tin sự kiện từ dữ liệu gửi lên từ form
    $event->update($request->all());

    // Redirect về trang hiển thị danh sách sự kiện hoặc trang chi tiết sự kiện đã cập nhật
    return redirect()->route('homeadmin')->with('success', 'Sự kiện đã được cập nhật thành công!');
}

}

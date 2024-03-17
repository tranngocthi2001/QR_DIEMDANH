<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function manage($eventId)
    {
        $event = Event::findOrFail($eventId);
        $attendances = $event->attendances; // Giả sử mỗi event có một quan hệ 'attendances' đã được định nghĩa

        return view('admin.attendances.manage', compact('event', 'attendances'));
    }

    public function scanQR(Request $request, $eventId)
    {
        // Xử lý quét mã QR và lưu thông tin điểm danh vào database
    }
    public function store(Request $request)
    {
        $request->validate([
            'attendee_name' => 'required|string',
        ]);

        $attendance = new Attendance();
        $attendance->attendee_name = $request->attendee_name;
        $attendance->save();

        return back()->with('success', 'Đã lưu thông tin tham dự.');
    }
    // app/Http/Controllers/AttendanceController.php
// app/Http/Controllers/AttendanceController.php
    public function showByEvent($event_id)
    {
        $attendances = Attendance::where('event_id', $event_id)->get();
        $event = Event::findOrFail($event_id); // Lấy thông tin sự kiện để hiển thị, nếu muốn

        return view('attendances.showByEvent', compact('attendances', 'event'));
    }




}

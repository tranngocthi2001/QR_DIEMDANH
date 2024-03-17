<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Admin Page</h3>
        </br><h2><a href="{{ route('users.manage') }}" class="btn btn-success">Quản Lý User</a></h2>
   

        <h2>Danh Sách Events</h2>
        <form action="{{ route('events.create') }}" method="GET">
            <button type="submit" class="btn btn-primary">Thêm Sự Kiện Mới</button>
            
        </form>
        @foreach($events as $event)
            <div>
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                <p>Thời gian bắt đầu: {{ $event->start_time }} - Thời gian kết thúc: {{ $event->end_time }}</p>
                <p>Địa điểm: {{ $event->location }}</p>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa Sự Kiện</button>
                </form>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Sửa Sự Kiện</a></br>
                
                <!-- Thêm link đến trang quản lý điểm danh cho sự kiện này -->
                <a href="{{ route('attendances.manage', $event->id) }}" class="btn btn-info">Quản Lý Điểm Danh</a>
                

                
                <!-- Thêm link đến trang quản lý user -->
                <a href="{{ route('attendances.showByEvent', $event->id) }}" class="btn btn-secondary">Xem Danh Sách Điểm Danh</a>
            </div>
        @endforeach
    </div>
@endsection

{{-- resources/views/attendances/showByEvent.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Danh Sách Điểm Danh: {{ $event->name }}</h2>
        <ul>
            @foreach ($attendances as $attendance)
                <li>{{ $attendance->user_name }} - Thời gian: {{ $attendance->created_at }}</li>
            @endforeach
        </ul>
    </div>
@endsection

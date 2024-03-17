




<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Home Page</h2>
    
    <!-- Nút đăng ký -->
    <a href="{{ route('register') }}">Register</a>

    <!-- Nút đăng nhập -->
    <a href="{{ route('login') }}">Login</a>
    <div class="container">
    <h1>Danh Sách Events</h1>
    <div>
        @foreach($events as $event)
            <div>
                <h2>{{ $event->name }}</h2>
                <p>{{ $event->description }}</p>
                <p>Thời gian bắt đầu: {{ $event->start_time }} - Thời gian kết thúc: {{ $event->end_time }}</p>
                <p>Địa điểm: {{ $event->location }}</p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>

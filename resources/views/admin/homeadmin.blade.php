
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h2>Home Page admin</h2>
    <form action="{{ route('events.create') }}" method="GET">
    <button type="submit" class="btn btn-primary">Thêm Sự Kiện Mới</button>
    </form>

    <div class="container">
    <h1>Danh Sách Events</h1>
    <div>
    @foreach($events as $event)
    <div>
        <h2>{{ $event->name }}</h2>
        <p>{{ $event->description }}</p>
        <p>Thời gian bắt đầu: {{ $event->start_time }} - Thời gian kết thúc: {{ $event->end_time }}</p>
        <p>Địa điểm: {{ $event->location }}</p>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xóa Sự Kiện</button>
        </form>
        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Sửa Sự Kiện</a>
        </br><a href="{{ route('attendances.showByEvent', $event->id) }}" class="btn btn-secondary">Xem Danh Sách Điểm Danh</a>
    </div>
@endforeach

    </div>
</div>



</body>
</html>

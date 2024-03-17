<!-- resources/views/events/edit.blade.php -->


@section('title', 'Chỉnh Sửa Sự Kiện')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Sự Kiện</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Các trường input ở đây -->
        <button type="submit" class="btn btn-primary">Cập Nhật Sự Kiện</button>
    </form>
</div>
@endsection
<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Tên Sự Kiện:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
    </div>
    <div class="form-group">
        <label for="description">Mô Tả:</label>
        <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="start_time">Thời Gian Bắt Đầu:</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i') }}">
    </div>
    <div class="form-group">
        <label for="end_time">Thời Gian Kết Thúc:</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i') }}">
    </div>
    <!-- Các trường input khác -->
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
</form>

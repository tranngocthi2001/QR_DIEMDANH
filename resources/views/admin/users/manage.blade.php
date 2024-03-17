{{-- resources/views/admin/users/manage.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>xem danh sách</h1>
    <!-- Nội dung quản lý người dùng -->
    {{-- resources/views/admin/users/manage.blade.php --}}


@section('content')
    <h1>Quản Lý Người Dùng</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Ví dụ về hành động: chỉnh sửa và xóa -->
                        <a href="{{ route('users.edit', $user->id) }}">Chỉnh sửa</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



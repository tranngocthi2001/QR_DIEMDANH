@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    
                    <!-- Thêm một nút để chuyển đến một trang khác, ví dụ: trang Events -->
                    
                    <!-- Thêm nút điểm danh sinh QR code (chỉ là ví dụ, cần có route phù hợp) -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    {!! $qrCode !!}
</div>


<!-- <a href="{{ route('generate.qr') }}" target="_blank" class="btn btn-primary">Generate QR Code</a>

<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
</head>
<body>
    <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
</body>
</html>

@endsection -->

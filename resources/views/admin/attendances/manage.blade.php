<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Document</title>
</head>
<body>
    

<!-- resources/views/admin/attendances/manage.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Quản lý Tham Dự</h1>
<!-- Nội dung khác -->
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>

<div id="qr-reader" style="width:500px"></div>
<div id="qr-reader-results"></div>
<div id="scanned-data-display"></div> <!-- Thêm dòng này -->

<script>
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code: ${decodedText}`, decodedResult);
        // Hiển thị dữ liệu quét được
        document.getElementById('scanned-data-display').innerText = `Dữ liệu quét được: ${decodedText}`;
        
        // Thêm dữ liệu vào danh sách và lưu vào cơ sở dữ liệu
        saveData(decodedText);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
    alert("Dữ liệu đã được quét và xử lý.");
</script>




<script>
    function saveData(decodedText) {
        // Lưu dữ liệu vào cơ sở dữ liệu bằng AJAX hoặc fetch API
        fetch('{{ route("attendance.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                attendee_name: decodedText
            })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Something went wrong');
        })
        .then(data => {
            console.log(data);
            // Thêm mục vào danh sách hiển thị
            let scannedItemsList = document.getElementById('scanned-items-list');
            let listItem = document.createElement('li');
            listItem.textContent = decodedText;
            scannedItemsList.appendChild(listItem);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endsection
</body>
</html>
<form id="submit-info-form" action="{{ route('attendance.store') }}" method="POST">
    @csrf
    <input type="hidden" id="full_name" name="full_name">
    <button type="submit" style="display: none;">Submit</button>
</form>
<!-- Danh sách đã quét -->
<ul id="scanned-items-list"></ul>

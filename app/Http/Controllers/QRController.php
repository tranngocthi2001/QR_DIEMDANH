<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function generateQR()
    {
        // Lấy thông tin user nếu cần và tạo dữ liệu cho mã QR code
        $data = 'Thông tin user';

        // // Sinh mã QR code từ dữ liệu
        $qrCode = QrCode::generate($data);

        // Trả về view hiển thị mã QR code
        return view('qr-code', compact('qrCode'));
    }
}

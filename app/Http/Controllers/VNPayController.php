<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/payment/vnpay/return";
        $vnp_TmnCode = "266YAYX8"; // Mã website tại VNPay
        $vnp_HashSecret = "3RMDK4TW6VBU058O2LHAO3OZ8XIJT0YK"; // Chuỗi bí mật

        $vnp_TxnRef = rand(1000, 9999); // Mã đơn hàng duy nhất
        $vnp_OrderInfo = 'noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 199999 * 100; // Giá trị giao dịch
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // Tạo các tham số thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Sắp xếp tham số theo thứ tự bảng chữ cái
        ksort($inputData);
        $query = "";
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            $hashdata .= ($hashdata ? '&' : '') . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // Tạo Secure Hash
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= "?" . $query . "vnp_SecureHash=" . $vnpSecureHash;

        // Chuyển hướng người dùng đến VNPay
        return redirect($vnp_Url);
    }

    public function returnPayment(Request $request)
    {
        $inputData = $request->all();

        // Kiểm tra mã phản hồi từ VNPay
        if ($inputData['vnp_ResponseCode'] == '00') {
            // Giao dịch thành công, cập nhật trạng thái Premium
            $user = Auth::user();
            $duration = 30; // 30 ngày
            $startsAt = now();
            $endsAt = now()->addDays($duration);

            // Lưu lịch sử giao dịch
            Subscription::create([
                'user_id' => $user->id,
                'plan_name' => 'Premium',
                'price' => 199000,
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
            ]);

            // Cập nhật trạng thái Premium
            $user->update([
                'is_premium' => true,
                'premium_expires_at' => $endsAt,
            ]);

            return redirect('/premium')->with('message', 'Thanh toán thành công! Gói Premium đã được kích hoạt.');
        }

        // Giao dịch thất bại, quay về trang Premium
        return redirect('/premium')->with('error', 'Thanh toán thất bại. Vui lòng thử lại.');
    }
}

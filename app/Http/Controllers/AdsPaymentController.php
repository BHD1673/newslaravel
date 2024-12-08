<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AdsPosition;
use App\Models\AdsPayment;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsPaymentController extends Controller
{
    public function pay($ad_id)
    {
        // Lấy thông tin quảng cáo
        $ad = Ads::findOrFail($ad_id);

        // Lấy thông tin vị trí quảng cáo từ bảng ads_position
        $ad_position = AdsPosition::where('position', $ad->position)->first();

        // Kiểm tra nếu vị trí quảng cáo không tồn tại
        if (!$ad_position) {
            return abort(404, 'Position not found.');
        }

        $start_time = Carbon::parse($ad->start_time);
        $end_time = Carbon::parse($ad->end_time);
        
        // Tính tổng thời gian quảng cáo
        $duration_in_hours = $start_time->diffInHours($end_time);

        // Tính toán tổng giá trị thanh toán
        $total_price = $ad_position->price * $duration_in_hours;
        $deposit = $total_price * 0.2;
        $paid_amount = $total_price * 0.8;

        // Hiển thị trang thanh toán
        return view('ads.payment', compact('ad', 'deposit', 'paid_amount'));
    }

    public function processPayment(Request $request, $ad_id)
    {
        // Kiểm tra và validate dữ liệu đầu vào
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'deposit' => 'required|numeric',
            'paid_amount' => 'required|numeric',
        ]);

        // Xử lý thanh toán (chỉ làm giả lập)
        $payment_status = 'completed';  // Giả lập trạng thái thanh toán hoàn tất

        // Lưu thông tin thanh toán vào bảng AdsPayment
        $payment = AdsPayment::create([
            'ad_id' => $ad_id,
            'amount' => $request->amount,
            'deposit' => $request->deposit,
            'paid_amount' => $request->paid_amount,
            'payment_status' => $payment_status,
            'payment_method' => $request->payment_method,
            'paid_at' => now(),
        ]);

        // Cập nhật trạng thái quảng cáo
        $ad = Ads::findOrFail($ad_id);
        $ad->status = 'active';  // Giả sử sau khi thanh toán, trạng thái quảng cáo là 'active'
        $ad->save();

        // Nếu thanh toán qua VNPay
        if ($request->payment_method == 'VNPay') {
            return $this->vnpayPayment($payment);
        }

        // Trở về trang lịch sử quảng cáo (hoặc có thể tùy chỉnh theo nhu cầu)
        return redirect()->route('ads.history');
    }

    public function vnpayPayment($payment)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/ads/payment/callback";
        
        // Thông tin cần thiết cho VNPay
        $vnp_TmnCode = "YY8GZP2R";
        $vnp_HashSecret = "UB8RMRTE4GIL7UE646WOHRGXVK4RDNJN";
        $vnp_TxnRef = rand(1, 100); // Tham chiếu giao dịch
        $vnp_OrderInfo = 'Thanh toán quảng cáo: ' . $payment->ad_id;
        $vnp_Amount = $payment->amount * 100;  // VNPay yêu cầu số tiền nhân với 100
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        ];

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        // Chuyển hướng người dùng đến VNPay để thanh toán
        return redirect()->away($vnp_Url);
    }

    public function vnpayPaymentCallback()
    {
        // Nhận thông tin từ VNPay sau khi thanh toán hoàn tất
        // Tại đây bạn có thể xử lý và cập nhật trạng thái thanh toán của đơn hàng
        
        // Ví dụ:
        // $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        // return view('checkout.vnpay', compact('cart'));

        return view('ads.history');
    }
}

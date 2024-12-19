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
        $ad = Ads::with('position', 'user')->findOrFail($ad_id);

        // dd($ad);
    
        // Kiểm tra nếu vị trí quảng cáo không tồn tại
        if (!$ad->position) {
            return abort(404, 'Vị trí quảng cáo không tồn tại.');
        }
    
        $start_time = Carbon::parse($ad->start_time);
        $end_time = Carbon::parse($ad->end_time);
        
        // Tính tổng thời gian quảng cáo
        $duration_in_hours = $start_time->diffInHours($end_time);
    
        // Tính toán tổng giá trị thanh toán
        $price_per_hour = $ad->position->price;
        $total_price = $price_per_hour * $duration_in_hours;
        $deposit = $total_price * 0.2; // 20% tiền đặt cọc
        $paid_amount = $total_price * 0.8; // 80% còn lại
    
        // Lấy thông tin người dùng và tên vị trí
        $user_name = $ad->user->name; // Đảm bảo rằng bảng `ads` có liên kết tới bảng `users`
        $position_name = $ad->position->position;
    
        // Hiển thị trang thanh toán
        return view('ads.payment', compact(
            'ad', 
            'user_name', 
            'position_name', 
            'price_per_hour', 
            'duration_in_hours', 
            'total_price', 
            'deposit', 
            'paid_amount'
        ));
    }
    

    public function processPayment(Request $request, $ad_id)
    {
        // Kiểm tra và validate dữ liệu đầu vào
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
        ]);
    
        // Xử lý thanh toán (giả lập)
        $payment_status = 'completed';  // Thanh toán chưa hoàn tất
    
        // Lưu thông tin thanh toán vào bảng AdsPayment
        AdsPayment::create([
            'ad_id' => $ad_id,
            'amount' => $request->amount,
            'payment_status' => $payment_status,
            'payment_method' => $request->payment_method,
            'paid_at' => now(),
        ]);
    
        // Nếu thanh toán qua VNPay, chuyển người dùng tới trang thanh toán của VNPay
        if ($request->payment_method == 'VNPay') {
            $payment = AdsPayment::where('ad_id', $ad_id)->latest()->first();
            return $this->vnpayPayment($payment);
        }
            // Cập nhật trạng thái quảng cáo
               $ad = Ads::findOrFail($ad_id);
               $ad->status = 'active';  // Giả sử sau khi thanh toán, trạng thái quảng cáo là 'active'
               $ad->save();
       
    
        return redirect()->route('ads.history')->with('success', 'Thanh toán đang được xử lý.');
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

    public function thankYou(Request $request)
    {
        $vnp_HashSecret = "UB8RMRTE4GIL7UE646WOHRGXVK4RDNJN";
        $inputData = $request->except(['vnp_SecureHash']);
        ksort($inputData);
        $hashData = urldecode(http_build_query($inputData));
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    
        if ($request->input('vnp_SecureHash') !== $secureHash) {
            return redirect()->route('ads.history')->withErrors(['payment_error' => 'Dữ liệu không hợp lệ.']);
        }
    
        if ($request->input('vnp_ResponseCode') == '00') {
            $payment = AdsPayment::find($request->input('vnp_TxnRef'));
            if ($payment) {
                $payment->payment_status = 'completed';
                $payment->save();
    
                $ad = Ads::find($payment->ad_id);
                if ($ad) {
                    $ad->status = 'active';
                    $ad->save();
                }
            }
            return view('ads.thankyou')->with('success', 'Thanh toán thành công. Quảng cáo đã được kích hoạt.');
        }
    
        return redirect()->route('ads.history')->withErrors(['payment_error' => 'Thanh toán thất bại. Vui lòng thử lại.']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

use Carbon\Carbon;

class VNPayController extends Controller
{
    public function createPayment(Request $request)
    {
        // Lấy tham số 'package' từ URL, mặc định là '1m' nếu không có
        $package = $request->input('package', '1m');

        // Định nghĩa các gói Premium
        $packages = [
            '1m' => [
                'name' => 'Monthly Premium',
                'duration_in_months' => 1,
                'price' => 199999,
            ],
            '3m' => [
                'name' => '3-Month Premium',
                'duration_in_months' => 3,
                'price' => 499999,
            ],
            '1y' => [
                'name' => 'Yearly Premium',
                'duration_in_months' => 12,
                'price' => 1699999,
            ],
        ];

        // Kiểm tra tính hợp lệ của gói Premium
        if (!array_key_exists($package, $packages)) {
            return redirect()->route('premium')->with('error', 'Gói Premium không hợp lệ.');
        }

        $selectedPackage = $packages[$package];

        // Lưu gói Premium được chọn vào session để sử dụng sau khi thanh toán
        session(['selected_premium_package' => $package]);

        // Thông tin VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return'); // Sử dụng helper route
        $vnp_TmnCode = "266YAYX8"; // Mã website tại VNPay
        $vnp_HashSecret = "3RMDK4TW6VBU058O2LHAO3OZ8XIJT0YK"; // Chuỗi bí mật

        // Tạo unique transaction reference
        $vnp_TxnRef = uniqid(); // Có thể sử dụng cách tạo mã duy nhất khác nếu cần
        $vnp_OrderInfo = 'Thanh toán cho gói ' . $selectedPackage['name'];
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $selectedPackage['price'] * 100; // VNPay yêu cầu đơn vị là VNĐ * 100
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $request->ip();

        // Tạo các tham số thanh toán
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
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if ($vnp_BankCode != "") {
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
        if (isset($inputData['vnp_ResponseCode']) && $inputData['vnp_ResponseCode'] == '00') {
            // Giao dịch thành công, cập nhật trạng thái Premium

            // Lấy gói Premium được chọn từ session
            $package = session('selected_premium_package', '1m'); // Mặc định là '1m'

            // Định nghĩa các gói Premium
            $packages = [
                '1m' => [
                    'name' => 'Monthly Premium',
                    'duration_in_months' => 1,
                    'price' => 199999,
                ],
                '3m' => [
                    'name' => '3-Month Premium',
                    'duration_in_months' => 3,
                    'price' => 499999,
                ],
                '1y' => [
                    'name' => 'Yearly Premium',
                    'duration_in_months' => 12,
                    'price' => 1699999,
                ],
            ];

            // Kiểm tra tính hợp lệ của gói Premium
            if (!array_key_exists($package, $packages)) {
                // Nếu gói không hợp lệ, mặc định là '1m'
                $package = '1m';
            }

            $selectedPackage = $packages[$package];

            $user = auth()->user();
            $currentPremiumExpiresAt = $user->premium_expires_at;

            // Tính toán thời hạn Premium mới
            if ($user->is_premium && $currentPremiumExpiresAt && Carbon::parse($currentPremiumExpiresAt)->isFuture()) {
                // Nếu người dùng đã là Premium và thời hạn hiện tại còn hiệu lực, thêm thời hạn mới vào thời hạn hiện tại
                $endsAt = Carbon::parse($currentPremiumExpiresAt)->addMonths($selectedPackage['duration_in_months']);
            } else {
                // Nếu người dùng chưa là Premium hoặc thời hạn đã hết, bắt đầu từ thời điểm hiện tại
                $endsAt = Carbon::now()->addMonths($selectedPackage['duration_in_months']);
            }

            // Lưu lịch sử giao dịch
            Subscription::create([
                'user_id' => $user->id,
                'plan_name' => $selectedPackage['name'],
                'price' => $selectedPackage['price'],
                'starts_at' => Carbon::now(),
                'ends_at' => $endsAt,
            ]);

            // Cập nhật trạng thái Premium của người dùng
            $user->update([
                'is_premium' => true,
                'premium_expires_at' => $endsAt,
            ]);

            // Xóa thông tin gói Premium khỏi session
            session()->forget('selected_premium_package');

            return redirect()->route('premium')->with('message', 'Thanh toán thành công! Gói Premium đã được kích hoạt.');
        }

        // Giao dịch thất bại, quay về trang Premium
        return redirect()->route('premium')->with('error', 'Thanh toán thất bại. Vui lòng thử lại.');
    }
}
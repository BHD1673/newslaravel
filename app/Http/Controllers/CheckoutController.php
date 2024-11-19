<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Mail;
>>>>>>> master

class CheckoutController extends Controller
{
    // Hiển thị trang checkout
    public function index()
    {
<<<<<<< HEAD
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
=======
        $cart = Cart::where('user_id', Auth::id())
        ->with(['items.product.productCategory']) // Lấy danh mục từ bảng product_category
        ->first();
>>>>>>> master
        return view('checkout.index', compact('cart'));
    }

    // Xử lý thanh toán
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
<<<<<<< HEAD
        ]);
=======
            'more_Info' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            
            'more_Info.string' => 'Thông tin bổ sung phải là một chuỗi ký tự.',
            'more_Info.max' => 'Thông tin bổ sung không được vượt quá 255 ký tự.',
        ]);
        
        $userEmail = Auth::user()->email;
>>>>>>> master

        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        // Tính tổng tiền
        $totalAmount = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Kiểm tra trạng thái còn hàng của các sản phẩm trong giỏ và số lượng
        foreach ($cart->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with('error', "Product {$item->product->name} does not have enough stock.");
            }
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalAmount,
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
<<<<<<< HEAD
=======
            'more_Info' => $request->input('more_Info'),    
            'payment_method' => 'Thanh toán bằng tiền mặt',
           
>>>>>>> master
        ]);

        // Thêm các sản phẩm vào bảng order_items và cập nhật stock
        foreach ($cart->items as $item) {
<<<<<<< HEAD
            OrderItem::create([
=======
            OrderItem::create([ 
>>>>>>> master
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
<<<<<<< HEAD
=======
                
>>>>>>> master
            ]);

            // Giảm số lượng stock của sản phẩm
            $product = $item->product;
            $product->stock -= $item->quantity;
            $product->save();
        }
<<<<<<< HEAD

=======
        // $orderDetails = [
        //     'name' => $order->name,
        //     'order_id' => $order->id,
        //     'total_price' => $order->total_price,
        //     'payment_method' => $order->payment_method,
        //     'items' => $cart->items,
        //     'more_Info' => $order->more_Info, 
        // ];
    
        // Mail::send('email.oder', $orderDetails, function ($message) use ($userEmail) {
        //     $message->to($userEmail)
        //             ->subject('Xác nhận đơn hàng')
        //             ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));  // Đảm bảo tên người gửi chính xác
        // });
        
>>>>>>> master
        // Xóa giỏ hàng sau khi thanh toán thành công
        $cart->items()->delete();

        return redirect()->route('orders.index')->with('success', 'Payment successful! Your order has been placed.');
    }
<<<<<<< HEAD
=======
    public function vnpay_payment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'additionalInfo' => 'nullable|string|max:255', // Thông tin bổ sung là tùy chọn nhưng nếu có thì phải là chuỗi
            'total_vnpay' => 'required|numeric|min:0', // Tổng giá trị đơn hàng phải là một số và không âm
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            
            'additionalInfo.string' => 'Thông tin bổ sung phải là một chuỗi ký tự.',
            'additionalInfo.max' => 'Thông tin bổ sung không được vượt quá 255 ký tự.',
            
            'total_vnpay.required' => 'Tổng giá trị thanh toán là bắt buộc.',
            'total_vnpay.numeric' => 'Tổng giá trị thanh toán phải là một số.',
            'total_vnpay.min' => 'Tổng giá trị thanh toán không thể nhỏ hơn 0.',
        ]);
        $data = $request->all();
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        $userId = Auth::id();
    
        // Lấy email từ bảng users
        $userEmail = Auth::user()->email;
    
        // Tính tổng giá trị đơn hàng
        $totalAmount = $data['total_vnpay'];
    
        // Lưu thông tin đơn hàng
        $order = new Order();
        $order->user_id = $userId;
        $order->name = $data['name'];
        $order->address = $data['address'];
        $order->phone = $data['phone'];
        $order->total_price = $totalAmount;
        $order->order_status_id = 1;
        $order->payment_method = 'VNPay';
        $order->more_Info = $data['more_Info'];
        $order->save();
    
        // Lưu các sản phẩm vào bảng order_items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
    
            // Giảm số lượng stock của sản phẩm
            $product = $item->product;
            $product->stock -= $item->quantity;
            $product->save();
        }
    
        // Xóa giỏ hàng
        $cart->items()->delete();
    
        
    
        // Chuyển hướng người dùng
        $rand = rand(1, 100);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/my-orders";
    
        $vnp_TmnCode = "YY8GZP2R";
        $vnp_HashSecret = "UB8RMRTE4GIL7UE646WOHRGXVK4RDNJN";
    
        $vnp_TxnRef = $rand;
        $vnp_OrderInfo = 'Thanh toán đơn hàng: ' . $order->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $order->total_price * 100;
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
            "vnp_OrderType" => $vnp_OrderType,
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
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
               //Gửi email thông báo
        // $orderDetails = [
        //     'name' => $order->name,
        //     'order_id' => $order->id,
        //     'total_price' => $order->total_price,
        //     'payment_method' => $order->payment_method,
        //     'items' => $cart->items,
        // ];
    
        // Mail::send('email.oder', $orderDetails, function ($message) use ($userEmail) {
        //     $message->to($userEmail)
        //             ->subject('Xác nhận đơn hàng')
        //             ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));  // Đảm bảo tên người gửi chính xác
        // });
        }
    
        return redirect()->away($vnp_Url);
    }
    
    public function vnpay_payment_callback(){
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        return view('checkout.vnpay', compact('cart'));
    }
    public function momo_payment(){


        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $returnUrl = "http://localhost:8000/atm/result_atm.php";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";
           
               
               
                $requestId = time()."";
                $requestType = "payWithMoMoATM";
                $extraData = "";
                //before sign HMAC SHA256 signature
                $rawHashArr =  array(
                                'partnerCode' => $partnerCode,
                                'accessKey' => $accessKey,
                                'requestId' => $requestId,
                                'amount' => $amount,
                                'orderId' => $orderId,
                                'orderInfo' => $orderInfo,
                                'bankCode' => $bankCode,
                                'returnUrl' => $returnUrl,
                                'notifyUrl' => $notifyurl,
                                'extraData' => $extraData,
                                'requestType' => $requestType
                                );
                // echo $serectkey;die;
                $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);

                $data =  array('partnerCode' => $partnerCode,
                                'accessKey' => $accessKey,
                                'requestId' => $requestId,
                                'amount' => $amount,
                                'orderId' => $orderId,
                                'orderInfo' => $orderInfo,
                                'returnUrl' => $returnUrl,
                                'bankCode' => $bankCode,
                                'notifyUrl' => $notifyurl,
                                'extraData' => $extraData,
                                'requestType' => $requestType,
                                'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result,true);  // decode json
                
                error_log( print_r( $jsonResult, true ) );
                header('Location: '.$jsonResult['payUrl']);
                
        
    }
        public function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }
>>>>>>> master
}

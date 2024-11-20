<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        /* Định nghĩa kiểu cho email */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 30px;
        }
        .header h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .header p {
            color: #777;
            font-size: 18px;
            margin: 0;
        }
        .order-summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .order-summary h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }
        .order-summary p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }
        .order-summary ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .order-summary li {
            padding: 8px 0;
            font-size: 16px;
            color: #555;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-size: 20px;
            font-weight: bold;
            color: #2e8b57;
            margin-top: 15px;
        }
        .payment-method {
            font-size: 18px;
            color: #333;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            padding-top: 30px;
        }
        .footer img {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #2e8b57;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #246d42;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Xin chào {{ $name }}!</h1>
            <p>Cảm ơn bạn đã mua hàng từ chúng tôi!</p>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Chi tiết đơn hàng</h2>
            <p><strong>Mã đơn hàng:</strong> {{ $order_id }}</p>
            <p class="total"><strong>Tổng số tiền:</strong> {{ number_format($total_price) }} VNĐ</p>
            <p class="payment-method"><strong>Phương thức thanh toán:</strong> {{ $payment_method }}</p>

            <!-- Order Items -->
            <ul>
                @foreach($items as $item)
                    <li>{{ $item->product->name }} - Số lượng: {{ $item->quantity }} - Giá: {{ number_format($item->price) }} VNĐ</li>
                @endforeach
            </ul>
        </div>

        <!-- Footer -->
        <p>Chúng tôi sẽ liên hệ với bạn sớm nhất để giao hàng!</p>

        <!-- Optional Button (e.g. tracking link) -->
        <a href="http://127.0.0.1:8000/my-orders" class="button">
            Xem chi tiết đơn hàng
        </a>

        <div class="footer">
            <img style="border-radius: 12px; height: 50px;" src="http://127.0.0.1:8000/kcnew/frontend/img/image_logo.png" alt="Logo">
            <p style="color: #333;">Trân trọng, <br>Đội ngũ hỗ trợ khách hàng của chúng tôi</p>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        /* Định nghĩa kiểu cho email */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 30px;
        }
        .header h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .header p {
            color: #777;
            font-size: 18px;
            margin: 0;
        }
        .order-summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .order-summary h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }
        .order-summary p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }
        .order-summary ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .order-summary li {
            padding: 8px 0;
            font-size: 16px;
            color: #555;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-size: 20px;
            font-weight: bold;
            color: #2e8b57;
            margin-top: 15px;
        }
        .payment-method {
            font-size: 18px;
            color: #333;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            padding-top: 30px;
        }
        .footer img {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #e0e0e0;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #246d42;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Xin chào {{ $name }}!</h1>
            <p>Cảm ơn bạn đã mua hàng từ chúng tôi!</p>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Chi tiết đơn hàng</h2>
            <p><strong>Mã đơn hàng:</strong> {{ $order_id }}</p>
            <p class="total"><strong>Tổng số tiền:</strong> {{ number_format($total_price) }} VNĐ</p>
            <p class="payment-method"><strong>Phương thức thanh toán:</strong> {{ $payment_method }}</p>

            <!-- Order Items -->
            <ul>
                @foreach($items as $item)
                    <li>{{ $item->product->name }} - Số lượng: {{ $item->quantity }} - Giá: {{ number_format($item->price) }} VNĐ</li>
                @endforeach
            </ul>
        </div>

        <!-- Footer -->
        <p>Chúng tôi sẽ liên hệ với bạn sớm nhất để giao hàng!</p>

        <!-- Optional Button (e.g. tracking link) -->
        <a href="http://127.0.0.1:8000/my-orders" class="button">
            Xem chi tiết đơn hàng
        </a>

        <div class="footer">
            <img style="border-radius: 12px; height: 50px;" src="http://127.0.0.1:8000/kcnew/frontend/img/image_logo.png" alt="Logo">
            <p style="color: #333;">Trân trọng, <br>Đội ngũ hỗ trợ khách hàng của chúng tôi</p>
        </div>
    </div>

</body>
</html>

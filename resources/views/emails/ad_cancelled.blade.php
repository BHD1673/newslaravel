<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo hủy quảng cáo</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Thông báo hủy quảng cáo</h2>
    <p>Quảng cáo của bạn với tiêu đề <strong>{{ $adTitle }}</strong> đã bị hủy vì không thực hiện thanh toán trong thời gian quy định.</p>
    <p>Vui lòng đăng ký lại quảng cáo và chọn thời gian khác.</p>
    <a href="{{ $adLink }}" class="btn">Đăng ký lại</a>
</body>
</html>

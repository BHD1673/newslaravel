<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo phê duyệt quảng cáo</title>
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
    <h2>Thông báo quảng cáo đã được phê duyệt</h2>
    <p>Quảng cáo của bạn với tiêu đề <strong>{{ $adTitle }}</strong> đã được phê duyệt thành công.</p>
    
    <p><strong>Thông tin quảng cáo:</strong></p>
    <ul>
        <li><strong>Tiêu đề:</strong> {{ $adTitle }}</li>
        <li><strong>Vị trí:</strong> {{ $adPosition }}</li>
        <li><strong>Thời gian bắt đầu:</strong> {{ \Carbon\Carbon::parse($adStartTime)->format('d/m/Y H:i') }}</li>
        <li><strong>Thời gian kết thúc:</strong> {{ \Carbon\Carbon::parse($adEndTime)->format('d/m/Y H:i') }}</li>
        <li><strong>Trạng thái:</strong> {{ ucfirst($adStatus) }}</li>
    </ul>

    <p>Quảng cáo của bạn đã được phê duyệt. Vui lòng quay lại <a href="{{ route('ads.history') }}">trang lịch sử quảng cáo</a> để thực hiện thanh toán.</p>
</body>
</html>

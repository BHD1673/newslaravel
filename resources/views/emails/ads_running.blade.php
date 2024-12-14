<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quảng cáo của bạn đang chạy</title>
</head>
<body>
    <h1>Chào bạn {{ $ad->user->name }},</h1>
    <p>Quảng cáo của bạn mang tiêu đề <strong>{{ $adTitle }}</strong> đã được phê duyệt và đang chạy.</p>
    <p><strong>Thời gian bắt đầu:</strong> {{ \Carbon\Carbon::parse($startTime)->format('d/m/Y H:i') }}</p>
    <p><strong>Thời gian kết thúc:</strong> {{ \Carbon\Carbon::parse($endTime)->format('d/m/Y H:i') }}</p>
    <p><a href="{{ $adLink }}">Nhấn vào đây để xem quảng cáo</a></p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quảng cáo của bạn đã hoàn thành</title>
</head>
<body>
    <h1>Chào bạn {{ $ad->user->name }},</h1>
    <p>Quảng cáo của bạn mang tiêu đề <strong>{{ $adTitle }}</strong> đã kết thúc và được đánh dấu là hoàn thành.</p>
    <p><strong>Thời gian bắt đầu:</strong> {{ \Carbon\Carbon::parse($startTime)->format('d/m/Y H:i') }}</p>
    <p><strong>Thời gian kết thúc:</strong> {{ \Carbon\Carbon::parse($endTime)->format('d/m/Y H:i') }}</p>
    <p>Quảng cáo của bạn đã được hoàn thành thành công.</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>

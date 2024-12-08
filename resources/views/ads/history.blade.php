<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container">
    <h1>Lịch sử quảng cáo</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Vị trí</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->title }}</td>
                    <td>{{ ucfirst($ad->position) }}</td>
                    <td>{{ ucfirst($ad->status) }}</td>
                    <td>{{ $ad->start_time }} - {{ $ad->end_time }}</td>
                    <td>
                    @if($ad->status === 'pending')
                        <!-- Chỉ cho phép hủy đơn nếu trạng thái là pending -->
                        <a href="{{ route('ads.cancel', $ad->id) }}" class="btn btn-danger">Hủy quảng cáo</a>
                    @elseif($ad->status === 'approved')
                        <!-- Cho phép thanh toán và hủy đơn nếu trạng thái là approved -->
                        <a href="{{ route('ads.payment', $ad->id) }}" class="btn btn-success">Thanh toán</a>
                        <a href="{{ route('ads.cancel', $ad->id) }}" class="btn btn-danger">Hủy quảng cáo</a>
                    @else
                        <!-- Không hiển thị thao tác gì nếu trạng thái không phải pending hoặc approved -->
                        <span class="text-muted">Không có thao tác</span>
                    @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


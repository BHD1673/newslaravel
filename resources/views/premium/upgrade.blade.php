@extends('main_layouts.master')

@section('title', 'Gói Premium')

@section('content')
<div class="container mt-5">
    <div class="premium-header text-center">
        <h1 class="display-4 text-gradient">Gói Premium</h1>
    </div>

    @if(session('message'))
        <div class="alert alert-success text-center fade-in-up">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center fade-in-up">
            {{ session('error') }}
        </div>
    @endif

    @if($isPremium)
        <div class="premium-info card mx-auto shadow-lg p-4 fade-in-up center ">
            <div class="card-body text-center">
                <h4 class="text-success">Bạn đang là thành viên Premium!</h4>
                <p>Hạn sử dụng gói Premium: <strong>{{ $premiumExpiresAt->format('d/m/Y H:i') }}</strong></p>
            </div>
        </div>
    @else
        <div class="upgrade-info text-center mt-5 fade-in-up">
            <h4 class="mb-4">Nâng cấp lên Premium với giá chỉ <strong>199.999 VND</strong> để tận hưởng lợi ích:</h4>
            <ul class="list-unstyled mb-4">
                <li class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> Tắt quảng cáo
                </li>
                <li class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> Truy cập tính năng cao cấp
                </li>
                <li class="d-flex align-items-center mb-2">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> Hỗ trợ ưu tiên 24/7
                </li>
            </ul>
            <a href="{{ route('vnpay.create') }}" class="btn btn-gradient btn-lg px-4 py-2">Nâng cấp ngay</a>
        </div>
    @endif
</div>

<style>
    /* Gradient text for header */
    .center{
        margin-left: 30%
    }
    .text-gradient {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Button gradient */
    .btn-gradient {
        background: linear-gradient(90deg, #6a11cb, #2575fc);
        border: none;
        color: white;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .btn-gradient:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(37, 117, 252, 0.4);
    }

    /* Fade-in effect */
    .fade-in-up {
        animation: fadeInUp 1s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Premium card styling */
    .premium-info {
        max-width: 500px;
        border: 1px solid #eaeaea;
        border-radius: 10px;
        background: white;
    }

    /* Upgrade section */
    .upgrade-info ul {
        list-style: none;
        padding: 0;
    }

    .upgrade-info ul li {
        font-size: 1.2rem;
    }
</style>

<!-- Include Bootstrap and additional libraries if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
    // Example of additional animations
    gsap.from(".premium-header", { duration: 1, y: -50, opacity: 0 });
    gsap.from(".fade-in-up", { duration: 1, y: 20, opacity: 0, delay: 0.5, stagger: 0.2 });
</script>
@endsection

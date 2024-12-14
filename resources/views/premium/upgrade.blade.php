@extends('main_layouts.master')

@section('title', 'Gói Premium')

@section('content')
<div class="container my-5">
    <!-- Header Section -->
    <div class="text-center mb-5 position-relative" data-aos="fade-down">
        <h1 class="display-3 text-gradient">Gói Premium</h1>
        <p class="lead text-muted">Nâng cấp để trải nghiệm những tính năng tuyệt vời nhất!</p>
        <!-- Background Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('images/header-background.jpg') }}'); background-size: cover; background-position: center; opacity: 0.1; z-index: -1;"></div>
    </div>

    <!-- Alerts -->
    @if(session('message'))
        <div class="alert alert-success text-center animated fadeInDown">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center animated fadeInDown">
            {{ session('error') }}
        </div>
    @endif

    <!-- Premium Status -->
    @if($isPremium)
        <div class="card premium-status-card shadow-lg mb-5" data-aos="zoom-in">
            <div class="card-body text-center">
                <i class="bi bi-gem display-4 text-warning mb-3"></i>
                <h4 class="text-success">Bạn đang là thành viên Premium!</h4>
                <p class="lead">Hạn sử dụng gói Premium: <strong>{{ \Carbon\Carbon::parse($premiumExpiresAt)->format('d/m/Y H:i') }}</strong></p>
                <a href="{{ route('vnpay.create') }}" class="btn btn-outline-warning mt-3">Gia hạn Premium</a>
            </div>
        </div>
    @else
        <!-- Premium Packages -->
        <div class="row justify-content-center" data-aos="fade-up">
            <!-- Gói 1 Tháng -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card package-card h-100 shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="card-title mb-0">1 Tháng</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        
                        <h3 class="text-center text-primary mb-3">199.999 VND</h3>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Tắt quảng cáo</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Truy cập tính năng cao cấp</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Hỗ trợ ưu tiên 24/7</li>
                        </ul>
                        <a href="{{ route('vnpay.create', ['package' => '1m']) }}" class="btn btn-primary mt-auto">Nâng cấp ngay</a>
                    </div>
                </div>
            </div>
            <!-- Gói 3 Tháng -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card package-card h-100 shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="card-title mb-0">3 Tháng</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        
                        <h3 class="text-center text-success mb-3">499.999 VND</h3>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Tắt quảng cáo</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Truy cập tính năng cao cấp</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Hỗ trợ ưu tiên 24/7</li>
                        </ul>
                        <a href="{{ route('vnpay.create', ['package' => '3m']) }}" class="btn btn-success mt-auto">Nâng cấp ngay</a>
                    </div>
                </div>
            </div>
            <!-- Gói 1 Năm -->
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card package-card h-100 shadow-lg">
                    <div class="card-header bg-warning text-dark text-center position-relative">
                        <h5 class="card-title mb-0">1 Năm</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        
                        <h3 class="text-center text-warning mb-3">1.699.999 VND</h3>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Tắt quảng cáo</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Truy cập tính năng cao cấp</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Hỗ trợ ưu tiên 24/7</li>
                        </ul>
                        <a href="{{ route('vnpay.create', ['package' => '1y']) }}" class="btn btn-warning text-dark mt-auto">Nâng cấp ngay</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<!-- Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- AOS Library for scroll animations -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    /* Gradient Text */
    .text-gradient {
        background: linear-gradient(90deg, #ff7e5f, #feb47b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Package Cards */
    .package-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }

    .package-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    }

    /* Premium Status Card */
    .premium-status-card {
        border: none;
        border-radius: 20px;
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        color: white;
        animation: pulse 2s infinite;
    }

    /* Animation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(246, 211, 101, 0.4);
        }
        70% {
            box-shadow: 0 0 0 20px rgba(246, 211, 101, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(246, 211, 101, 0);
        }
    }

    /* Badge Hot */
    .badge-danger {
        font-size: 0.8rem;
        padding: 0.5em 0.7em;
    }

    /* Header Background Overlay */
    .position-relative {
        position: relative;
        z-index: 1;
    }

    .position-absolute {
        position: absolute;
        z-index: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .premium-status-card {
            padding: 2rem;
        }

        .package-card img {
            width: 60px;
        }
    }

    /* Additional Styling for Buttons */
    .btn-primary {
        background: linear-gradient(45deg, #ff7e5f, #feb47b);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #feb47b, #ff7e5f);
    }

    .btn-success {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        border: none;
    }

    .btn-success:hover {
        background: linear-gradient(45deg, #0072ff, #00c6ff);
    }

    .btn-warning {
        background: linear-gradient(45deg, #f7971e, #ffd200);
        border: none;
    }

    .btn-warning:hover {
        background: linear-gradient(45deg, #ffd200, #f7971e);
    }
</style>

<!-- Include Bootstrap JS (nếu chưa có trong master layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Animate.js for additional animations (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
    });
</script>
@endsection
@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section("wrapper")
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng bài viết</p>
                                    <h4 class="my-1 text-info">{{ $countPost }}</h4>
                                    <!-- <p class="mb-0 font-13">+2.5% from last week</p> -->
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bx-message-square-edit'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng danh mục</p>
                                    <h4 class="my-1 text-danger">{{ $countCategories }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bx bx-menu'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng người quản trị</p>
                                    <h4 class="my-1 text-success">{{ $countAdmin }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bx-user' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Tổng khách hàng</p>
                                    <h4 class="my-1 text-warning">{{ $countUser }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card radius-10 mb-0 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                
                                    <h6 class="mb-0 w-20">Biểu đồ Lượt Xem & Bình Luận</h6>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                            <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;" id="last7days">7 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="last30days">30 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="last90days">90 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="allTime">Tất cả thời gian</a></li>
                                        </ul>
                                    </div>
                             
                               
                            </div>
                    
                            <!-- Biểu đồ kết hợp: Lượt xem và Bình Luận -->
                            <canvas id="combinedChart" width="400" height="200"></canvas>
                            
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-12 col-lg-12 mt-3">
                        <div class="card radius-10 mb-4 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="mb-0">Biểu đồ Tổng Doanh Thu</h6>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                            <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;" id="revenueLast7days">7 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="revenueLast30days">30 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="revenueLast90days">90 ngày qua</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" id="revenueAllTime">Tất cả thời gian</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <canvas id="revenueChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card w-100 radius-10">
                        <div class="card-body">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Lượt Xem</p>
                                            <h4 class="my-1">{{ $countView }}</h4>
                                            <!-- <p class="mb-0 font-13">+6.2% from last week</p> -->
                                        </div>
                                        <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class='bx bx-show'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Bình luận</p>
                                            <h4 class="my-1">{{ $countComments }}</h4>
                                        </div>
                                        <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-comment-detail'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Tổng tài khoản premium</p>
                                            <h5 class="my-1">{{ $countPremium }}</h5>
                                        </div>
                                        <div class="widgets-icons-2 bg-warning text-white ms-auto"><i class='bx bxs-star'></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                         
                                        
                            <div class="card mt-4 radius-10 mb-0 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>   
                                            <p class="mb-0 text-secondary">Tổng danh thu</p>
                                            <h5 class="my-1">
                                                {{ number_format($premiumRevenue, 0, ',', '.')  }}VND       
                                            </h5>
                                        </div>
                                        <div class="widgets-icons-2 bg-success text-white ms-auto"> <i class='bx bxs-wallet'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                </div>
            </div><!--end row-->

        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dữ liệu lượt xem, bình luận, và bài viết cho các khoảng thời gian
            const data = {
                '7days': {
                    views: {{ $viewsLast7Days }},
                    comments: {{ $commentsLast7Days }},
                    posts: {{ $postsLast7Days }}
                },
                '30days': {
                    views: {{ $viewsLast30Days }},
                    comments: {{ $commentsLast30Days }},
                    posts: {{ $postsLast30Days }}
                },
                '90days': {
                    views: {{ $viewsLast90Days }},
                    comments: {{ $commentsLast90Days }},
                    posts: {{ $postsLast90Days }}
                },
                'allTime': {
                    views: {{ $viewsAllTime }},
                    comments: {{ $commentsAllTime }},
                    posts: {{ $postsAllTime }}
                }
            };

            // Biểu đồ Lượt Xem & Bình Luận
            const ctxCombined = document.getElementById('combinedChart').getContext('2d');
            let combinedChart = new Chart(ctxCombined, {
                type: 'bar',
                data: {
                    labels: ['7 ngày qua', '30 ngày qua', '90 ngày qua', 'Tất cả thời gian'],
                    datasets: [{
                        label: 'Lượt xem',
                        data: [
                            data['7days'].views, 
                            data['30days'].views, 
                            data['90days'].views, 
                            data['allTime'].views
                        ],
                        backgroundColor: '#ff9800',
                        borderColor: '#f57c00',
                        borderWidth: 1
                    }, {
                        label: 'Bình luận',
                        data: [
                            data['7days'].comments, 
                            data['30days'].comments, 
                            data['90days'].comments, 
                            data['allTime'].comments
                        ],
                        backgroundColor: '#4caf50',
                        borderColor: '#4caf50',
                        borderWidth: 2,
                        type: 'bar',
                        fill: false,
                        tension: 0.1
                    }, {
                        label: 'Bài viết',
                        data: [
                            data['7days'].posts, 
                            data['30days'].posts, 
                            data['90days'].posts, 
                            data['allTime'].posts
                        ],
                        backgroundColor: '#2196F3',
                        borderColor: '#1976D2',
                        borderWidth: 1,
                        type: 'bar',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    if (tooltipItem.datasetIndex === 0) {
                                        return tooltipItem.raw + ' lượt xem';
                                    } else if (tooltipItem.datasetIndex === 1) {
                                        return tooltipItem.raw + ' bình luận';
                                    } else if (tooltipItem.datasetIndex === 2) {
                                        return tooltipItem.raw + ' bài viết';
                                    }
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10
                            }
                        }
                    }
                }
            });

            // Hàm cập nhật biểu đồ Lượt Xem & Bình Luận theo khoảng thời gian
            function updateCombinedChart(timePeriod) {
                const newLabels = {
                    '7days': ['7 ngày qua'],
                    '30days': ['30 ngày qua'],
                    '90days': ['90 ngày qua'],
                    'allTime': ['Tất cả thời gian']
                };

                combinedChart.data.labels = newLabels[timePeriod];

                combinedChart.data.datasets[0].data = [data[timePeriod].views];
                combinedChart.data.datasets[1].data = [data[timePeriod].comments];
                combinedChart.data.datasets[2].data = [data[timePeriod].posts];

                combinedChart.update();
            }

            // Thêm sự kiện cho dropdown chọn khoảng thời gian của biểu đồ Lượt Xem & Bình Luận
            document.getElementById('last7days').addEventListener('click', function() {
                updateCombinedChart('7days');
            });
            document.getElementById('last30days').addEventListener('click', function() {
                updateCombinedChart('30days');
            });
            document.getElementById('last90days').addEventListener('click', function() {
                updateCombinedChart('90days');
            });
            document.getElementById('allTime').addEventListener('click', function() {
                updateCombinedChart('allTime');
            });

            // Dữ liệu và biểu đồ Tổng Doanh Thu
            const revenueData = {
                '7days': {{ $premiumRevenueLast7Days }},
                '30days': {{ $premiumRevenueLast30Days }},
                '90days': {{ $premiumRevenueLast90Days }},
                'allTime': {{ $premiumRevenue }}
            };

            const revenueLabels = ['7 ngày qua', '30 ngày qua', '90 ngày qua', 'Tất cả thời gian'];
            const revenueValues = [
                revenueData['7days'], 
                revenueData['30days'], 
                revenueData['90days'], 
                revenueData['allTime']
            ];

            const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
            let revenueChart = new Chart(ctxRevenue, {
                type: 'bar',
                data: {
                    labels: revenueLabels,
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: revenueValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let value = context.parsed.y;
                                    return 'Doanh thu: ' + value.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return value.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
                                }
                            }
                        }
                    }
                }
            });

            // Hàm cập nhật biểu đồ Tổng Doanh Thu theo khoảng thời gian
            function updateRevenueChart(timePeriod) {
                let newData;
                let newLabels;

                switch(timePeriod) {
                    case '7days':
                        newData = [revenueData['7days']];
                        newLabels = ['7 ngày qua'];
                        break;
                    case '30days':
                        newData = [revenueData['30days']];
                        newLabels = ['30 ngày qua'];
                        break;
                    case '90days':
                        newData = [revenueData['90days']];
                        newLabels = ['90 ngày qua'];
                        break;
                    case 'allTime':
                        newData = [revenueData['allTime']];
                        newLabels = ['Tất cả thời gian'];
                        break;
                    default:
                        newData = revenueValues;
                        newLabels = revenueLabels;
                }

                revenueChart.data.labels = newLabels;
                revenueChart.data.datasets[0].data = newData;
                revenueChart.update();
            }

            // Thêm sự kiện cho dropdown chọn khoảng thời gian của biểu đồ Tổng Doanh Thu
            document.getElementById('revenueLast7days').addEventListener('click', function() {
                updateRevenueChart('7days');
            });
            document.getElementById('revenueLast30days').addEventListener('click', function() {
                updateRevenueChart('30days');
            });
            document.getElementById('revenueLast90days').addEventListener('click', function() {
                updateRevenueChart('90days');
            });
            document.getElementById('revenueAllTime').addEventListener('click', function() {
                updateRevenueChart('allTime');
            });

            // Biểu đồ thứ ba (chart1) nếu bạn vẫn muốn giữ nó
            var ctxChart1 = document.getElementById("chart1") ? document.getElementById("chart1").getContext('2d') : null;
            if (ctxChart1) {
                var gradientStroke1 = ctxChart1.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#6078ea');  
                gradientStroke1.addColorStop(1, '#17c5ea'); 
                
                var gradientStroke2 = ctxChart1.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#ff8359');
                gradientStroke2.addColorStop(1, '#ffdf40');
            
                var myChart = new Chart(ctxChart1, {
                    type: 'bar',
                    data: {
                        labels: ['16/06/2022', '17/06/2022', '18/06/2022', '19/06/2022', '20/06/2022', '21/06/2022', '22/06/2022'],
                        datasets: [{
                            label: 'Lượt xem',
                            data: [10, 13, 9, 16, 10, 12, 15],
                            borderColor: gradientStroke1,
                            backgroundColor: gradientStroke1,
                            hoverBackgroundColor: gradientStroke1,
                            pointRadius: 0,
                            fill: false,
                            borderWidth: 0
                        }, {
                            label: 'Bình luận',
                            data: [8, 14, 19, 12, 7, 18, 8],
                            borderColor: gradientStroke2,
                            backgroundColor: gradientStroke2,
                            hoverBackgroundColor: gradientStroke2,
                            pointRadius: 0,
                            fill: false,
                            borderWidth: 0
                        }]
                    },
                    options:{
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom',
                            display: false,
                            labels: {
                                boxWidth:8
                            }
                        },
                        tooltips: {
                            displayColors:false,
                        },	
                        scales: {
                            x: { // Sử dụng 'x' thay vì 'xAxes' cho phiên bản Chart.js mới
                                barPercentage: .5
                            },
                            y: { // Thêm trục y nếu cần
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 10
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
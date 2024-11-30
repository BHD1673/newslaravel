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
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Biểu đồ Lượt Xem & Bình Luận</h6>
                                </div>
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
                    
                    <script>
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

    // Tạo biểu đồ ban đầu
    const ctx = document.getElementById('combinedChart').getContext('2d');
    let combinedChart = new Chart(ctx, {
        type: 'bar',  // Biểu đồ cột cho lượt xem
        data: {
            labels: ['7 ngày qua', '30 ngày qua', '90 ngày qua', 'Tất cả thời gian'], // Labels mặc định
            datasets: [{
                label: 'Lượt xem',
                data: [
                    data['7days'].views, 
                    data['30days'].views, 
                    data['90days'].views, 
                    data['allTime'].views
                ],
                backgroundColor: '#ff9800', // Màu nền cho biểu đồ cột
                borderColor: '#f57c00', // Màu viền cho biểu đồ cột
                borderWidth: 1
            }, {
                label: 'Bình luận',
                data: [
                    data['7days'].comments, 
                    data['30days'].comments, 
                    data['90days'].comments, 
                    data['allTime'].comments
                ],
                backgroundColor: '#4caf50', // Không tô màu cho cột bình luận
                borderColor: '#4caf50', // Màu đường cho bình luận
                borderWidth: 2,
                type: 'bar',  // Biểu đồ đường cho bình luận
                fill: false,   // Không tô màu dưới đường
                tension: 0.1
            }, {
                label: 'Bài viết',
                data: [
                    data['7days'].posts, 
                    data['30days'].posts, 
                    data['90days'].posts, 
                    data['allTime'].posts
                ],
                backgroundColor: '#2196F3', // Màu nền cho cột bài viết
                borderColor: '#1976D2', // Màu viền cho cột bài viết
                borderWidth: 1,
                type: 'bar',  // Biểu đồ cột cho bài viết
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
                                return tooltipItem.raw + ' lượt xem'; // Lượt xem
                            } else if (tooltipItem.datasetIndex === 1) {
                                return tooltipItem.raw + ' bình luận'; // Bình luận
                            } else if (tooltipItem.datasetIndex === 2) {
                                return tooltipItem.raw + ' bài viết'; // Bài viết
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

    // Hàm cập nhật biểu đồ và labels theo mốc thời gian
    function updateChartData(timePeriod) {
        // Cập nhật lại labels
        const newLabels = {
            '7days': ['7 ngày qua'],
            '30days': ['30 ngày qua'],
            '90days': ['90 ngày qua'],
            'allTime': ['Tất cả thời gian']
        };

        combinedChart.data.labels = newLabels[timePeriod]; // Cập nhật labels

        // Cập nhật lại dữ liệu của biểu đồ
        combinedChart.data.datasets[0].data = [data[timePeriod].views];  // Lượt xem
        combinedChart.data.datasets[1].data = [data[timePeriod].comments];  // Bình luận
        combinedChart.data.datasets[2].data = [data[timePeriod].posts];     // Bài viết
        
        // Cập nhật lại biểu đồ với labels mới
        combinedChart.update();
    }

    // Lắng nghe sự kiện khi người dùng chọn khoảng thời gian từ dropdown
    document.getElementById('last7days').addEventListener('click', function() {
        updateChartData('7days');
    });
    document.getElementById('last30days').addEventListener('click', function() {
        updateChartData('30days');
    });
    document.getElementById('last90days').addEventListener('click', function() {
        updateChartData('90days');
    });
    document.getElementById('allTime').addEventListener('click', function() {
        updateChartData('allTime');
    });
</script>
                    
                    
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
		$(document).ready(function () {
			// Biểu đồ
        var ctx = document.getElementById("chart1").getContext('2d');
        
        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#6078ea');  
            gradientStroke1.addColorStop(1, '#17c5ea'); 
            
        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke2.addColorStop(0, '#ff8359');
            gradientStroke2.addColorStop(1, '#ffdf40');
        
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['16/06/2022', '17/06/2022', '18/06/2022', '19/06/2022', '20/06/2022', '21/06/2022', '22/06/2022'],
                datasets: [{
                    label: 'Lượt xem',
                    data: [ 10, 13, 9,16, 10, 12,15],
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 0
                }, {
                    label: 'Bình luận',
                    data: [ 8, 14, 19, 12, 7, 18, 8],
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
                    xAxes: [{
                        barPercentage: .5
                    }]
                    }
                }
            });
                });

	</script>


@endsection

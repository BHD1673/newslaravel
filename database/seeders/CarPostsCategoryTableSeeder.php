<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarPostsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Welcome to Chưa phân loại',
                'slug' => 'welcome-chua-phan-loai',
                'excerpt' => 'This is the first uncategorized post.',
                'body' => 'This post belongs to the Chưa phân loại category.',
                'user_id' => 1,
                'category_id' => 1,
                'views' => 10,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bài ngẫu nhiên',
                'slug' => 'bai-ngau-nhien',
                'excerpt' => 'Nội dung ngẫu nhiên',
                'body' => 'Nội dung ngẫu nhiên',
                'user_id' => 1,
                'category_id' => 3,
                'views' => 5,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bài viết dump',
                'slug' => 'bai-viet-dump',
                'excerpt' => 'Nội dung ngẫu nhiên',
                'body' => 'Nội dung ngẫu nhiên',
                'user_id' => 1,
                'category_id' => 3,
                'views' => 5,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bài viết dump',
                'slug' => 'bai-viet-dump',
                'excerpt' => 'Nội dung ngẫu nhiên',
                'body' => 'Nội dung ngẫu nhiên',
                'user_id' => 1,
                'category_id' => 3,
                'views' => 5,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Electric Cars: Powering a Sustainable Future',
                'slug' => 'electric-cars-future',
                'excerpt' => 'Sự phát triển của xe điện đang thay đổi cách chúng ta di chuyển và bảo vệ môi trường.',
                'body' => 'Xe điện không chỉ giảm thiểu khí thải carbon mà còn cải thiện chất lượng không khí đô thị. Các hãng xe lớn như Tesla và Ford đang đầu tư mạnh vào các dòng xe chạy hoàn toàn bằng điện, mở ra kỷ nguyên mới của giao thông bền vững. Với pin công nghệ cao và mạng lưới sạc điện phát triển, tương lai xe điện đang rất hứa hẹn.',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 12,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Autonomous Vehicles: Driving Towards the Future',
                'slug' => 'autonomous-vehicles',
                'excerpt' => 'Công nghệ xe tự lái hứa hẹn mang đến giao thông an toàn và tiện lợi hơn bao giờ hết.',
                'body' => 'Xe tự lái sử dụng cảm biến và trí tuệ nhân tạo để hoạt động mà không cần tài xế. Các công ty như Google, Tesla và Uber đang thử nghiệm công nghệ này để giảm tai nạn giao thông và tối ưu hóa di chuyển. Tương lai gần, xe tự lái có thể trở thành lựa chọn chính trong các thành phố thông minh.',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 20,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Flying Cars: Từ Giấc Mơ đến Hiện Thực',
                'slug' => 'flying-cars-reality',
                'excerpt' => 'Khám phá tiềm năng của ô tô bay trong tương lai gần.',
                'body' => 'Công nghệ ô tô bay đang phát triển nhanh chóng nhờ vào tiến bộ trong kỹ thuật hàng không và điện tử. Các mẫu xe như SkyDrive và AeroMobil đã bắt đầu thử nghiệm thực tế. Trong tương lai, ô tô bay có thể giúp giảm tình trạng ùn tắc giao thông và mở ra một kỷ nguyên mới cho di chuyển đô thị.',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 18,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Hydrogen-Powered Vehicles: Năng Lượng Sạch của Tương Lai',
                'slug' => 'hydrogen-vehicles',
                'excerpt' => 'Xe chạy bằng hydro hứa hẹn thay thế nhiên liệu hóa thạch và giảm ô nhiễm.',
                'body' => 'Xe chạy bằng pin nhiên liệu hydro là một trong những giải pháp thay thế đầy tiềm năng cho xe chạy xăng và dầu. Các hãng như Toyota và Hyundai đã ra mắt các dòng xe như Mirai và Nexo, sử dụng khí hydro sạch để tạo ra điện và chỉ thải ra nước. Đây là một bước tiến quan trọng trong cuộc chiến chống biến đổi khí hậu.',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 14,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Smart Traffic Systems: Giải Pháp cho Giao Thông Tương Lai',
                'slug' => 'smart-traffic-systems',
                'excerpt' => 'Hệ thống giao thông thông minh giúp cải thiện lưu lượng và giảm ùn tắc.',
                'body' => 'Các thành phố thông minh đang triển khai hệ thống giao thông thông minh sử dụng IoT và AI để quản lý phương tiện và đèn giao thông. Nhờ vào dữ liệu thời gian thực, các tuyến đường sẽ được tối ưu hóa để giảm ùn tắc và tiết kiệm thời gian di chuyển. Đây là chìa khóa cho giao thông hiện đại và bền vững.',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 22,
                'approved' => 1,
                'is_delete_post' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
                                                
        ]);
    }
}

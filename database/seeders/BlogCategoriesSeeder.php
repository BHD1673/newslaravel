<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Thời Trang', 'description' => 'Gợi ý xu hướng thời trang và phong cách cá nhân.'],
            ['name' => 'Làm Đẹp', 'description' => 'Bí quyết chăm sóc da, trang điểm và làm đẹp.'],
            ['name' => 'Sức Khỏe & Dinh Dưỡng', 'description' => 'Chia sẻ về tập luyện, chế độ ăn lành mạnh.'],
            ['name' => 'Tình Yêu & Gia Đình', 'description' => 'Xây dựng gia đình hạnh phúc và nuôi dạy con cái.'],
            ['name' => 'Phong Cách Sống', 'description' => 'Mẹo cân bằng cuộc sống và phát triển bản thân.'],
            ['name' => 'Công Việc & Sự Nghiệp', 'description' => 'Lời khuyên phát triển sự nghiệp và khởi nghiệp.'],
            ['name' => 'Ẩm Thực', 'description' => 'Công thức nấu ăn, món ăn đặc biệt.'],
            ['name' => 'Du Lịch', 'description' => 'Gợi ý điểm đến và mẹo du lịch an toàn.'],
            ['name' => 'Tài Chính Cá Nhân', 'description' => 'Hướng dẫn tiết kiệm và quản lý tài chính.'],
            ['name' => 'Tâm Lý & Cảm Hứng Sống', 'description' => 'Cải thiện tinh thần và tìm động lực sống.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

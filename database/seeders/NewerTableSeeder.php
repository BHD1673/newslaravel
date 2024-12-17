<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ẩm thực',
                'slug' => 'am-thuc',
                'user_id' => 1,
                'description' => 'Khám phá ẩm thực, công thức nấu ăn và văn hóa ẩm thực từ khắp nơi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thời trang',
                'slug' => 'thoi-trang',
                'user_id' => 1,
                'description' => 'Xu hướng thời trang mới, các mẹo phối đồ và phong cách cá nhân.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nghệ thuật',
                'slug' => 'nghe-thuat',
                'user_id' => 1,
                'description' => 'Các bài viết về nghệ thuật, hội họa, âm nhạc và văn học.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Môi trường',
                'slug' => 'moi-truong',
                'user_id' => 1,
                'description' => 'Thông tin về bảo vệ môi trường, biến đổi khí hậu và phát triển bền vững.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khoa học',
                'slug' => 'khoa-hoc',
                'user_id' => 1,
                'description' => 'Tin tức về khoa học, khám phá vũ trụ và các nghiên cứu mới nhất.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Xe cộ',
                'slug' => 'xe-co',
                'user_id' => 1,
                'description' => 'Các bài viết về ô tô, xe máy, và công nghệ giao thông.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chứng khoán',
                'slug' => 'chung-khoan',
                'user_id' => 1,
                'description' => 'Tin tức về thị trường chứng khoán, tài chính và các mẹo đầu tư.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khởi nghiệp',
                'slug' => 'khoi-nghiep',
                'user_id' => 1,
                'description' => 'Thông tin hữu ích cho doanh nhân, khởi nghiệp và phát triển kinh doanh.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Văn hóa',
                'slug' => 'van-hoa',
                'user_id' => 1,
                'description' => 'Các bài viết về văn hóa, truyền thống và giá trị xã hội.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tâm lý',
                'slug' => 'tam-ly',
                'user_id' => 1,
                'description' => 'Các bài viết về tâm lý học, sức khỏe tinh thần và cách cải thiện cuộc sống.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Công trình',
                'slug' => 'cong-trinh',
                'user_id' => 1,
                'description' => 'Thông tin về kiến trúc, xây dựng và các công trình nổi tiếng.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lịch sử',
                'slug' => 'lich-su',
                'user_id' => 1,
                'description' => 'Tìm hiểu lịch sử, các sự kiện quan trọng và nhân vật nổi bật.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        
        
    }
}

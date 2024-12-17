<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Công nghệ',
                'slug' => 'cong-nghe',
                'user_id' => 1,
                'description' => 'Các bài viết về công nghệ, khoa học kỹ thuật và các xu hướng mới.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thế giới',
                'slug' => 'the-gioi',
                'user_id' => 1,
                'description' => 'Tin tức quốc tế, sự kiện toàn cầu và các vấn đề thế giới.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pháp luật',
                'slug' => 'phap-luat',
                'user_id' => 1,
                'description' => 'Cập nhật thông tin pháp luật, các quy định và tranh tụng nổi bật.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chưa phân loại',
                'slug' => 'chua-phan-loai',
                'user_id' => 1,
                'description' => 'Danh mục cho các bài viết chưa được phân loại rõ ràng.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kinh doanh',
                'slug' => 'kinh-doanh',
                'user_id' => 1,
                'description' => 'Thông tin kinh doanh, thị trường, và các xu hướng kinh tế.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thể thao',
                'slug' => 'the-thao',
                'user_id' => 1,
                'description' => 'Tin tức thể thao, cập nhật các giải đấu và thành tích mới nhất.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Giáo dục',
                'slug' => 'giao-duc',
                'user_id' => 1,
                'description' => 'Các bài viết về giáo dục, hướng dẫn học tập và phát triển kỹ năng.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sức khỏe',
                'slug' => 'suc-khoe',
                'user_id' => 1,
                'description' => 'Thông tin sức khỏe, y tế và các mẹo chăm sóc cơ thể.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Giải trí',
                'slug' => 'giai-tri',
                'user_id' => 1,
                'description' => 'Tin tức giải trí, các sự kiện văn hóa và showbiz.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Du lịch',
                'slug' => 'du-lich',
                'user_id' => 1,
                'description' => 'Các bài viết về du lịch, địa điểm và mẹo đi lại.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BasicPostsTableSeeder extends Seeder
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
                'title' => 'The Future of Vehicles',
                'slug' => 'future-of-vehicles',
                'excerpt' => 'Khám phá sự thay đổi của các loại phương tiện',
                'body' => 'Bài viết này chứa nội dung về xe hơi',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 25,
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
            
        ]);
    }
}

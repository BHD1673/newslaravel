<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_categories_and_posts()
    {
        // Giả lập dữ liệu trong database
        $category1 = Category::factory()->create(['name' => 'Category 1']);
        $category2 = Category::factory()->create(['name' => 'Category 2']);
        $category_unclassified = Category::factory()->create(['name' => 'Chưa phân loại']);

        // Tạo các bài viết
        Post::factory()->create(['category_id' => $category1->id]);
        Post::factory()->create(['category_id' => $category2->id]);
        Post::factory()->create(['category_id' => $category_unclassified->id]);

        // Gọi phương thức index
        $response = $this->get(route('categories.index'));

        // Kiểm tra nếu view trả về đúng và dữ liệu được gửi vào view
        $response->assertStatus(200);
        $response->assertViewHas('categories');
        $response->assertViewHas('posts_new');
    }
}

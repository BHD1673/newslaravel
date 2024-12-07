<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

use Tests\TestCase;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AdminCategoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    // Khai báo biến $user ở đây
    protected $user;

    // Thiết lập người dùng giả định cho test
    protected function setUp(): void
    {
        parent::setUp();

        // Tạo một người dùng giả và gán vào biến $user
        $this->user = User::factory()->create([
            'password' => bcrypt('password'), // Đảm bảo mã hóa mật khẩu
            'role_id' => 1  // Giả sử '1' là role của admin
        ]);

        // Đăng nhập người dùng đã tạo
        Auth::login($this->user);
    }

    /** @test */
    public function it_shows_the_category_index_page()
    {
        // Tạo danh mục mẫu
        Category::factory()->count(5)->create();

        // Gửi yêu cầu đến phương thức index
        $response = $this->get(route('admin.categories.index'));

        // Kiểm tra mã phản hồi và xem có dữ liệu danh mục trong view hay không
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin_dashboard.categories.index');
        $response->assertViewHas('categories');
    }

    /** @test */
    public function it_shows_the_create_category_form()
    {
        // Gửi yêu cầu đến phương thức create
        $response = $this->get(route('admin.categories.create'));

        // Kiểm tra mã phản hồi
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin_dashboard.categories.create');
    }

    /** @test */
    public function it_can_store_a_new_category()
    {
        // Dữ liệu hợp lệ để tạo danh mục
        $data = [
            'name' => 'New Category',
            'slug' => 'new-category',
        ];

        // Gửi yêu cầu POST tới phương thức store
        $response = $this->post(route('admin.categories.store'), $data);

        // Kiểm tra xem danh mục đã được thêm vào cơ sở dữ liệu chưa
        $this->assertDatabaseHas('categories', $data);

        // Kiểm tra chuyển hướng và thông báo thành công
        $response->assertRedirect(route('admin.categories.create'));
        $response->assertSessionHas('success', 'Thêm danh mục bài viết thành công.');
    }

    /** @test */
    public function it_can_show_a_category_detail()
    {
        // Tạo danh mục mẫu
        $category = Category::factory()->create();

        // Gửi yêu cầu đến phương thức show
        $response = $this->get(route('admin.categories.show', $category));

        // Kiểm tra mã phản hồi và dữ liệu
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin_dashboard.categories.show');
        $response->assertViewHas('category', $category);
    }

    /** @test */
    public function it_can_show_the_edit_category_form()
    {
        // Tạo danh mục mẫu
        $category = Category::factory()->create();

        // Gửi yêu cầu đến phương thức edit
        $response = $this->get(route('admin.categories.edit', $category));

        // Kiểm tra mã phản hồi
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin_dashboard.categories.edit');
        $response->assertViewHas('category', $category);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        // Tạo danh mục mẫu
        $category = Category::factory()->create();

        // Dữ liệu cập nhật
        $data = [
            'name' => 'Updated Category',
            'slug' => 'updated-category',
        ];

        // Gửi yêu cầu PUT đến phương thức update
        $response = $this->put(route('admin.categories.update', $category), $data);

        // Kiểm tra xem danh mục đã được cập nhật trong cơ sở dữ liệu chưa
        $category->refresh();
        $this->assertEquals($data['name'], $category->name);
        $this->assertEquals($data['slug'], $category->slug);

        // Kiểm tra chuyển hướng và thông báo thành công
        $response->assertRedirect(route('admin.categories.edit', $category));
        $response->assertSessionHas('success', 'Sửa danh mục bài viết thành công.');
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        // Tạo danh mục mẫu
        $category = Category::factory()->create();

        // Đảm bảo danh mục 'Chưa phân loại' không thể xóa
        $category->name = 'Chưa phân loại';
        $category->save();

        // Gửi yêu cầu DELETE đến phương thức destroy
        $response = $this->delete(route('admin.categories.destroy', $category));

        // Kiểm tra xem danh mục chưa bị xóa
        $this->assertDatabaseHas('categories', ['id' => $category->id]);

        // Kiểm tra mã phản hồi
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}

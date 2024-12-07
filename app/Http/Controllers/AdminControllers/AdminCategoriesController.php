<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class AdminCategoriesController extends Controller
{
    // Quy tắc validation cho các trường cần thiết
    private $rules = [
        'name' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug'
    ];

    // Hiển thị danh sách các danh mục, kèm theo thông tin người tạo
    public function index()
    {
        // Trả về view với dữ liệu danh mục
        $categories = Category::with('user')->orderBy('id', 'DESC')->paginate(10);
        return view('admin_dashboard.categories.index', compact('categories'));
    }

    // Hiển thị form tạo mới danh mục
    public function create()
    {
        return view('admin_dashboard.categories.create');
    }

    // Lưu danh mục mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Xác thực dữ liệu từ form
        $validated = $request->validate($this->rules);

        // Thêm user_id (người dùng hiện tại)
        $validated['user_id'] = auth()->id();

        // Tạo danh mục mới
        Category::create($validated);

        // Chuyển hướng về trang tạo danh mục và thông báo thành công
        return redirect()->route('admin.categories.create')->with('success', 'Thêm danh mục bài viết thành công.');
    }

    // Hiển thị chi tiết danh mục
    public function show(Category $category)
    {
        return view('admin_dashboard.categories.show', compact('category'));
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit', compact('category'));
    }

    // Cập nhật danh mục
    public function update(Request $request, Category $category)
    {
        // Chỉnh sửa quy tắc unique cho trường 'slug' khi cập nhật
        $this->rules['slug'] = [
            'required',
            Rule::unique('categories')->ignore($category)
        ];

        // Xác thực dữ liệu
        $validated = $request->validate($this->rules);

        // Cập nhật danh mục
        $category->update($validated);

        // Chuyển hướng về trang chỉnh sửa và thông báo thành công
        return redirect()->route('admin.categories.edit', $category)->with('success', 'Sửa danh mục bài viết thành công.');
    }

    // Xóa danh mục
    public function destroy(Category $category)
    {
        // Kiểm tra nếu danh mục là 'Chưa phân loại' thì không được xóa
        if ($category->name === 'Chưa phân loại') {
            abort(404);
        }

        // Lấy ID của danh mục 'Chưa phân loại'
        $default_category_id = Category::where('name', 'Chưa phân loại')->first()->id;

        // Cập nhật các bài viết thuộc danh mục đang xóa thành danh mục 'Chưa phân loại'
        $category->posts()->update(['category_id' => $default_category_id]);

        // Xóa danh mục
        $category->delete();

        // Chuyển hướng về danh sách danh mục và thông báo thành công
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục bài viết thành công.');
    }
}

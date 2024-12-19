<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class AdminCategoriesController extends Controller
{
    /**
     * Quy tắc xác thực dữ liệu cho các hành động tạo và cập nhật danh mục.
     */
    private $rules = [
        'name' => 'required|string|min:3|max:30',
        'slug' => 'required|string|unique:categories,slug'
    ];

    /**
     * Hiển thị danh sách các danh mục.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('user') // Giả sử mỗi danh mục thuộc về một người dùng
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin_dashboard.categories.index', compact('categories'));
    }

    /**
     * Hiển thị form tạo mới danh mục.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin_dashboard.categories.create');
    }

    /**
     * Lưu danh mục mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $validated = $request->validate($this->rules);

        // Thêm user_id từ người dùng đang đăng nhập
        $validated['user_id'] = auth()->id();

        // Tạo danh mục mới
        Category::create($validated);

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.categories.create')
            ->with('success', 'Thêm danh mục bài viết thành công.');
    }

    /**
     * Hiển thị chi tiết một danh mục cụ thể.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('admin_dashboard.categories.show', compact('category'));
    }

    /**
     * Hiển thị form chỉnh sửa một danh mục cụ thể.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit', compact('category'));
    }

    /**
     * Cập nhật thông tin danh mục trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        // Cập nhật quy tắc xác thực cho trường 'slug' để bỏ qua danh mục hiện tại
        $rules = $this->rules;
        $rules['slug'] = [
            'required',
            'string',
            Rule::unique('categories', 'slug')->ignore($category->id)
        ];

        // Xác thực dữ liệu nhập vào
        $validated = $request->validate($rules);

        // Cập nhật thông tin danh mục
        $category->update($validated);

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.categories.edit', $category)
            ->with('success', 'Sửa danh mục bài viết thành công.');
    }

    /**
     * Xóa một danh mục khỏi cơ sở dữ liệu.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Kiểm tra xem danh mục có phải là "Chưa phân loại" không
        if ($category->name === 'Chưa phân loại') {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Không thể xóa danh mục "Chưa phân loại".');
        }

        // Tìm danh mục mặc định để chuyển các bài viết sang
        $defaultCategory = Category::firstOrCreate(
            ['name' => 'Chưa phân loại'],
            ['slug' => 'chua-phan-loai', 'user_id' => auth()->id()]
        );

        // Cập nhật các bài viết thuộc danh mục này sang danh mục mặc định
        $category->posts()->update(['category_id' => $defaultCategory->id]);

        // Xóa danh mục
        $category->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.categories.index')
            ->with('success', 'Xóa danh mục bài viết thành công.');
    }
}

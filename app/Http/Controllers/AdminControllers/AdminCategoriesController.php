<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Http\Services\CategoryService;

class AdminCategoriesController extends Controller
{
    protected $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    private $rules = [
        'name' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug'
    ];

    public function index(Request $request)
    {
        $params = [
            'name' =>$request->input('name')
        ];

        $categories = $this->categoryService->index($params);
        return view('admin_dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin_dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        Category::create($validated);

        return redirect()->route('admin.categories.create')->with('success','Thêm danh mục bài viết thành công.');
    }


    public function show(Category $category)
    {
        return view('admin_dashboard.categories.show',[
            'category' => $category
        ]);
    }


    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit',[
            'category' => $category
        ]);
    }


    public function update(Request $request,Category $category)
    {
        $this->rules['slug'] = ['required', Rule::unique('categories')->ignore($category)];
        $validated = $request->validate($this->rules);

        $category->update($validated);

        return redirect()->route('admin.categories.edit', $category)->with('success','Sửa danh mục bài viết thành công.');
    }


    public function destroy(Category $category)
    {
        $default_category_id = Category::where('name', 'Chưa phân loại')->first()->id;

        if($category->name === 'Chưa phân loại')
            abort(404);

        $category->posts()->update(['category_id'=> $default_category_id]);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Xóa danh mục bài viết thành công.');
    }
}

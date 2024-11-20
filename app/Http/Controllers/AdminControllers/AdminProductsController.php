<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Đảm bảo bạn đã tạo model Product
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Models\ProductCategory;
>>>>>>> damquangthanh
=======
use App\Models\ProductCategory;
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // Lấy danh sách sản phẩm từ database
        $products = Product::with('productStatus')->paginate(10); // Thay 'status' bằng 'productStatus'

        return view('admin_dashboard.products.index', compact('products')); // Trả về view
    }
=======
        // Lấy danh sách sản phẩm và kèm theo thông tin danh mục (productCategory)
        $products = Product::with('productCategory', 'productStatus')->paginate(10); // Thêm 'productCategory' vào đây
    
        return view('admin_dashboard.products.index', compact('products')); // Trả về view
    }
    
>>>>>>> damquangthanh
=======
        // Lấy danh sách sản phẩm và kèm theo thông tin danh mục (productCategory)
        $products = Product::with('productCategory', 'productStatus')->paginate(10); // Thêm 'productCategory' vào đây
    
        return view('admin_dashboard.products.index', compact('products')); // Trả về view
    }
    
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return view('admin_dashboard.products.create'); // Trả về view tạo sản phẩm
=======
        $categories = ProductCategory::all();  // Lấy tất cả danh mục
        return view('admin_dashboard.products.create', compact('categories'));
>>>>>>> damquangthanh
=======
        $categories = ProductCategory::all();  // Lấy tất cả danh mục
        return view('admin_dashboard.products.create', compact('categories'));
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
<<<<<<< HEAD
<<<<<<< HEAD
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
        ]);
=======
{
    // Xác thực dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'old_price' => 'nullable|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'product_status_id' => 'required|exists:product_statuses,id',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:product_categories,id', // Thêm xác thực category_id
    ]);
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

<<<<<<< HEAD
=======
{
    // Xác thực dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'old_price' => 'nullable|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'product_status_id' => 'required|exists:product_statuses,id',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:product_categories,id', // Thêm xác thực category_id
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    // Lưu ảnh vào thư mục public/images/products
    $imagePath = $request->file('image')->move(public_path('images/products'), $request->file('image')->getClientOriginalName());

    // Lưu sản phẩm
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'old_price' => $request->old_price,
        'image' => 'images/products/' . $request->file('image')->getClientOriginalName(),
        'product_status_id' => $request->product_status_id,
        'stock' => $request->stock,
        'category_id' => $request->category_id, // Lưu category_id vào sản phẩm
    ]);

    // Tự động ngừng kích hoạt nếu hàng tồn kho bằng 0
    if ($product->stock <= 0) {
        $product->product_status_id = 2; // Ngừng kích hoạt
        $product->save();
    }

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
}

<<<<<<< HEAD
>>>>>>> damquangthanh
=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $product = Product::with('productStatus')->findOrFail($id); // Thay 'status' bằng 'productStatus'

        return view('admin_dashboard.products.show', compact('product')); // Trả về view hiển thị chi tiết sản phẩm
    }
=======
        // Tìm sản phẩm kèm theo thông tin danh mục và trạng thái
        $product = Product::with('productCategory', 'productStatus')->findOrFail($id); // Thêm 'productCategory' vào đây
    
        return view('admin_dashboard.products.show', compact('product')); // Trả về view hiển thị chi tiết sản phẩm
    }
    
>>>>>>> damquangthanh
=======
        // Tìm sản phẩm kèm theo thông tin danh mục và trạng thái
        $product = Product::with('productCategory', 'productStatus')->findOrFail($id); // Thêm 'productCategory' vào đây
    
        return view('admin_dashboard.products.show', compact('product')); // Trả về view hiển thị chi tiết sản phẩm
    }
    
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function edit(string $id)
=======
    public function edit($id)
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    {
        $product = Product::findOrFail($id);  // Lấy sản phẩm cần chỉnh sửa
        $productCategories = ProductCategory::all(); // Lấy tất cả danh mục sản phẩm từ bảng product_category
        return view('admin_dashboard.products.edit', compact('product', 'productCategories'));
    }
<<<<<<< HEAD
=======
    public function edit($id)
    {
        $product = Product::findOrFail($id);  // Lấy sản phẩm cần chỉnh sửa
        $productCategories = ProductCategory::all(); // Lấy tất cả danh mục sản phẩm từ bảng product_category
        return view('admin_dashboard.products.edit', compact('product', 'productCategories'));
    }
    
>>>>>>> damquangthanh
=======
    
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'category_id' => 'required|exists:product_categories,id', 
>>>>>>> damquangthanh
=======
            'category_id' => 'required|exists:product_categories,id', 
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cập nhật sản phẩm trong database
        $product = Product::findOrFail($id);

        // Nếu có ảnh mới, lưu ảnh vào thư mục public/images/products
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->move(public_path('images/products'), $request->file('image')->getClientOriginalName());
            $product->image = 'images/products/' . $request->file('image')->getClientOriginalName();
        }

        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'product_status_id' => $request->product_status_id,
            'stock' => $request->stock,
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'category_id' => $request->category_id,
>>>>>>> damquangthanh
=======
            'category_id' => $request->category_id,
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
        ]);

        // Cập nhật trạng thái sản phẩm dựa trên hàng tồn kho
        $product->product_status_id = ($product->stock <= 0) ? 2 : 1;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    

>>>>>>> damquangthanh
=======
    

>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        $product->delete(); // Xóa sản phẩm

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công.'); // Quay lại danh sách sản phẩm
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> damquangthanh
=======
}
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb

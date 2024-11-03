<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Đảm bảo bạn đã tạo model Product
use Illuminate\Support\Facades\Validator;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách sản phẩm từ database
        $products = Product::with('productStatus')->paginate(10); // Thay 'status' bằng 'productStatus'

        return view('admin_dashboard.products.index', compact('products')); // Trả về view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_dashboard.products.create'); // Trả về view tạo sản phẩm
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Lưu ảnh vào thư mục public/images/products
        $imagePath = $request->file('image')->move(public_path('images/products'), $request->file('image')->getClientOriginalName());

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image' => 'images/products/' . $request->file('image')->getClientOriginalName(),
            'product_status_id' => $request->product_status_id,
            'stock' => $request->stock,
        ]);

        // Tự động ngừng kích hoạt nếu hàng tồn kho bằng 0
        if ($product->stock <= 0) {
            $product->product_status_id = 2; // Ngừng kích hoạt
            $product->save();
        }

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('productStatus')->findOrFail($id); // Thay 'status' bằng 'productStatus'

        return view('admin_dashboard.products.show', compact('product')); // Trả về view hiển thị chi tiết sản phẩm
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('productStatus')->findOrFail($id); // Thay 'status' bằng 'productStatus'

        return view('admin_dashboard.products.edit', compact('product')); // Trả về view chỉnh sửa sản phẩm
    }

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
        ]);

        // Cập nhật trạng thái sản phẩm dựa trên hàng tồn kho
        $product->product_status_id = ($product->stock <= 0) ? 2 : 1;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        $product->delete(); // Xóa sản phẩm

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công.'); // Quay lại danh sách sản phẩm
    }
}

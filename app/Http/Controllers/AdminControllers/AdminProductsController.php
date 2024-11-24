<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductCategory;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('productCategory', 'productStatus')->paginate(10);
        return view('admin_dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin_dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = $request->file('image')->move(public_path('images/products'), $request->file('image')->getClientOriginalName());

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image' => 'images/products/' . $request->file('image')->getClientOriginalName(),
            'product_status_id' => $request->product_status_id,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        if ($product->stock <= 0) {
            $product->product_status_id = 2;
            $product->save();
        }

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function show(string $id)
    {
        $product = Product::with('productCategory', 'productStatus')->findOrFail($id);
        return view('admin_dashboard.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productCategories = ProductCategory::all();
        return view('admin_dashboard.products.edit', compact('product', 'productCategories'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->move(public_path('images/products'), $request->file('image')->getClientOriginalName());
            $product->image = 'images/products/' . $request->file('image')->getClientOriginalName();
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'product_status_id' => $request->product_status_id,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        $product->product_status_id = ($product->stock <= 0) ? 2 : 1;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}

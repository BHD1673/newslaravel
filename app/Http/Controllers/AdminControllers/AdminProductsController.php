<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['productCategory', 'productStatus'])->paginate(10);
        return view('admin_dashboard.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin_dashboard.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        $imagePath = $request->file('image')->storeAs(
            'images/products',
            $request->file('image')->getClientOriginalName(),
            'public'
        );

        $product = Product::create(array_merge($validated, [
            'image' => $imagePath,
        ]));

        if ($product->stock <= 0) {
            $product->update(['product_status_id' => 2]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function show(string $id)
    {
        $product = Product::with(['productCategory', 'productStatus'])->findOrFail($id);
        return view('admin_dashboard.products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        return view('admin_dashboard.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_status_id' => 'required|exists:product_statuses,id',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs(
                'images/products',
                $request->file('image')->getClientOriginalName(),
                'public'
            );
            $product->image = $imagePath;
        }

        $product->update(array_merge($validated, [
            'image' => $product->image ?? $product->getOriginal('image'),
        ]));

        $product->update(['product_status_id' => ($product->stock <= 0) ? 2 : 1]);

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}

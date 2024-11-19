<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'old_price',
        'category_id',
        'image',
        'stock', // Thêm số lượng tồn kho sản phẩm
        'product_status_id', // Thêm trạng thái sản phẩm
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productStatus()
    {
        return $this->belongsTo(ProductStatus::class); // Quan hệ với model ProductStatus
    }
    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'product_status_id');
    }
    public function getDiscountedPriceAttribute()
    {
        return $this->old_price ? $this->price - $this->old_price : null;
    }
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
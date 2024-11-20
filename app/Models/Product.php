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
<<<<<<< HEAD
<<<<<<< HEAD
        'product_status_id' // Thêm trạng thái sản phẩm
=======
        'product_status_id', // Thêm trạng thái sản phẩm
>>>>>>> damquangthanh
=======
        'product_status_id', // Thêm trạng thái sản phẩm
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
<<<<<<< HEAD
>>>>>>> damquangthanh
=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
}
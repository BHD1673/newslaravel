<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // Định nghĩa bảng của model
    protected $table = 'product_categories';

    // Các thuộc tính có thể gán đại trà
    protected $fillable = [
        'name',
        'product_id',
    ];

    // Mối quan hệ với bảng Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); // Liên kết với bảng products thông qua 'category_id'
    }
}

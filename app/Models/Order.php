<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'name',
        'address',
        'phone',
<<<<<<< HEAD
<<<<<<< HEAD
        'order_status_id',
=======
        'payment_method',
        'order_status_id',
        'more_Info',
>>>>>>> damquangthanh
=======
        'payment_method',
        'order_status_id',
        'more_Info',
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
    ];

    // Quan hệ với model OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Thêm quan hệ với model OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
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

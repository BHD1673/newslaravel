<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPayment extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà model này liên kết
    protected $table = 'ads_payment';
    public $timestamps = false;

    // Các trường có thể được gán giá trị
    protected $fillable = [
        'ad_id',
        'amount',
        'deposit',
        'paid_amount',
        'payment_status',
        'payment_method',
        'paid_at'
    ];

    // Quan hệ với bảng Ads (một AdsPayment thuộc về một quảng cáo)
    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPayment extends Model
{
    use HasFactory;

    protected $table = 'ads_payment';
    public $timestamps = false; 

    protected $fillable = [
        'ad_id',
        'amount',
        'deposit',
        'paid_amount',
        'payment_status',
        'payment_method',
        'paid_at',
    ];

    // Quan hệ với bảng Ads
    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id', 'id');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'img',
        'link',
        'email',
        'phone',
        'start_time',
        'end_time',
        'position',
        'status',
    ];

    // Quan hệ với bảng 'users'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng 'ads_position'
    public function position()
    {
        return $this->belongsTo(AdsPosition::class, 'position', 'position');
    }

    // Quan hệ với bảng 'ads_payment'
    public function payment()
    {
        return $this->hasOne(AdsPayment::class);
    }

    // Quan hệ với bảng 'ads_history'
    public function history()
    {
        return $this->hasMany(AdsHistory::class);
    }

    // Kiểm tra thời gian quảng cáo có bị trùng không
    public static function checkOverlap($position, $start_time, $end_time)
    {
        return self::where('position', $position)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('start_time', [$start_time, $end_time])
                    ->orWhereBetween('end_time', [$start_time, $end_time]);
            })
            ->exists();
    }
}

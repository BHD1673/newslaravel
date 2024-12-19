<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $table = 'ads';
    

    protected $fillable = [
        'user_id',
        'title',
        'img',
        'link',
        'email',
        'phone',
        'start_time',
        'end_time',
        'position_id',
        'status',
        'email_sent',
    ];
    public $timestamps = false; 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // Quan hệ với bảng AdsPosition
    public function position()
    {
        return $this->belongsTo(AdsPosition::class, 'position_id', 'id');
    }

    // Quan hệ với bảng AdsHistory
    public function history()
    {
        return $this->hasMany(AdsHistory::class, 'ad_id', 'id');
    }

    // Quan hệ với bảng AdsPayment
    public function payment()
    {
        return $this->hasOne(AdsPayment::class, 'ad_id', 'id');
    }

    // Kiểm tra quảng cáo trùng thời gian
    public static function checkOverlap($position_id, $start_time, $end_time)
    {
        return self::where('position_id', $position_id)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('start_time', [$start_time, $end_time])
                    ->orWhereBetween('end_time', [$start_time, $end_time])
                    ->orWhere(function ($subQuery) use ($start_time, $end_time) {
                        $subQuery->where('start_time', '<=', $start_time)
                            ->where('end_time', '>=', $end_time);
                    });
            })
            ->exists();
    }
}

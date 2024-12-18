<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsHistory extends Model
{
    use HasFactory;
    protected $table = 'ads_history';
    public $timestamps = false;
    protected $fillable = [
        'ad_id',
        'status',
        'action_taken',
        'action_time',
        'refund_amount',
    ];

    // Quan hệ với bảng 'ads'
    public function ad()
    {
        return $this->belongsTo(Ads::class);
    }
}

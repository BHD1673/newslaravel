<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPosition extends Model
{
    use HasFactory;

    protected $table = 'ads_position';
    public $timestamps = false; 

    protected $fillable = [
        'position',
        'price',
        'created_at'
    ];

    // Quan hệ với bảng Ads
    public function ads()
    {
        return $this->hasMany(Ads::class, 'position_id', 'id');
    }
}

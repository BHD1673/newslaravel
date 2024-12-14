<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPosition extends Model
{
    // Đảm bảo tên bảng là 'ads_position' (không phải 'ads_positions')
    protected $table = 'ads_position';

    // Các cột khác (nếu có)
    protected $fillable = ['position', 'price'];
}

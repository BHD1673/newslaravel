<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PostLog extends Model
{
    use HasFactory;
   
    protected $table = "post_log";
    protected $fillable = ['role_log','date_log','user_id','post_id', 'status', 'note'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

}   

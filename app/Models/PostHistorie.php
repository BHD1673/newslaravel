<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PostHistorie extends Model
{
    use HasFactory;
    const CREATE = 'create';
    CONST EDIT = 'edit';
    const DELETE = 'delete';
    const APPROVED = 1;

    protected $table = "post_histories";
    protected $fillable = ['title','body','user_id','post_id', 'status','date_action', 'note', 'action', 'time_action','user_action','is_delete_post'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

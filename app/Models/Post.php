<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','slug', 'excerpt', 'body', 'user_id','category_id', 'approved', 'is_delete_post'];

    const APPROVED = [
        'not_approved_yet' => 1,
        'refuse' => 2,
        'browse' => 3
        
    ];

    const POST_DELETE = [
        'true' => 1,
        'flase' => 0
    ];
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function postLog() {
        return $this->belongsTo(PostLog::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    } 

    // scope functions
    public function scopeApproved($query){
        return $query->where('approved', 1);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    const ROLE_ADMIN = 'admin';
    const ROLE_EMPLOYEE = 'employee';
    const ROLE_REPORTER = 'reporter';

    public function users() {
        return $this->hasMany(User::class);
    } 

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_role')->withTimestamps();
    }
}

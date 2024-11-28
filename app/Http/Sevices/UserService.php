<?php
namespace App\Http\Services;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService extends BaseService
{
    public function index()
    {
        $query = User::with('role');

        if (Auth::user()->role->name !== Role::ROLE_ADMIN) {
            $query->where('id', Auth::id());
        }

        return $query->orderBy('id', 'DESC')->paginate(10);
    }
}  
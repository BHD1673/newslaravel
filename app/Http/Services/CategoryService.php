<?php
namespace App\Http\Services;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService extends BaseService
{
    public function index($params)
    {
        $query = Category::with('user');

        // if (Auth::user()->role->name === Role::ROLE_ADMIN) {
        //     $query->where('user_id', Auth::id());
        // }

        if (isset($params['name'])) {
            $query->where('name', 'like', "%{$params['name']}%");
        }
        
        // if (isset($params['user_id'])) {
        //     $query->where('user_id', '=', $params['user_id']);
        // }

        return $query->orderBy('id', 'DESC')->paginate(10);
    }
}  
<?php
namespace App\Http\Services;
use APP\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    public function handleRedirectAfterLogin()
    {
        // get user info
        $user = Auth::user();
        $role = $user->role->name;

        if($role === 'user'){
            return route("home");
        }
        // get user permissions
        $permissions = $user->role->permissions;
        $firstPermission = $permissions->first();

        // TODO: Go to the page corresponding to the user's rights
        return route($firstPermission->name);
    }
}
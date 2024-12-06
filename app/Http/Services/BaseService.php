<?php
namespace App\Http\Services;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class BaseService
{
    public function isNoAdmin()
    {
        return Auth::user()->role->name !== Role::ROLE_ADMIN;
    }

    public function isEmployee()
    {
        return Auth::user()->role->name === Role::ROLE_EMPLOYEE;
    }

    public function isAdmin()
    {
        return Auth::user()->role->name === Role::ROLE_ADMIN;
    }

    public function isReporter()
    {
        return Auth::user()->role->name === Role::ROLE_REPORTER;
    }
}  
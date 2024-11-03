<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        // Kiểm tra nếu bảng 'categories' tồn tại
        if (Schema::hasTable('categories')) {
            $categories = Category::withCount('posts')->orderBy('posts_count', 'DESC')->take(10)->get();
            View::share('categories', $categories); // Đổi tên thành 'categories'
        }

        // Kiểm tra nếu bảng 'settings' tồn tại
        if (Schema::hasTable('settings')) {
            $setting = Setting::find(1);
            View::share('setting', $setting);
        }
    }
}

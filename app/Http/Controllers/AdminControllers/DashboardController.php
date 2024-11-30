<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Role;
use App\Models\Comment; // Import model Comment
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $countPost = Post::all()->count();


        $countCategories = Category::all()->count();

        $role_admin = Role::where('name', '!=', 'user')->first();
        $countAdmin = User::all()->where('role_id', $role_admin->id)->count();

        $role_user = Role::where('name', 'user')->first();
        $countUser = User::all()->where('role_id', $role_user->id)->count();

        // Tính số lượng tài khoản Premium
        $countPremium = User::where('is_premium', 1)->count();

        // Tính số bình luận
        $countComments = Comment::all()->count();  // Tổng số bình luận trong tất cả các bài viết

        // Tính lượt xem trong các khoảng thời gian
        $viewsLast7Days = Post::where('created_at', '>=', Carbon::now()->subDays(7))
            ->sum('views');  // Tổng lượt xem trong 7 ngày qua
        $viewsLast30Days = Post::where('created_at', '>=', Carbon::now()->subDays(30))
            ->sum('views');  // Tổng lượt xem trong 30 ngày qua
        $viewsLast90Days = Post::where('created_at', '>=', Carbon::now()->subDays(90))
            ->sum('views');  // Tổng lượt xem trong 90 ngày qua
        $viewsAllTime = Post::sum('views');  // Tổng lượt xem tất cả thời gian

        // Tính bình luận trong các khoảng thời gian
        $commentsLast7Days = Comment::where('created_at', '>=', Carbon::now()->subDays(7))->count();  // Bình luận trong 7 ngày qua
        $commentsLast30Days = Comment::where('created_at', '>=', Carbon::now()->subDays(30))->count();  // Bình luận trong 30 ngày qua
        $commentsLast90Days = Comment::where('created_at', '>=', Carbon::now()->subDays(90))->count();  // Bình luận trong 90 ngày qua

        $postsLast7Days = Post::where('created_at', '>=', Carbon::now()->subDays(7))->count();  // Bài viết trong 7 ngày qua
        $postsLast30Days = Post::where('created_at', '>=', Carbon::now()->subDays(30))->count();  // Bài viết trong 30 ngày qua
        $postsLast90Days = Post::where('created_at', '>=', Carbon::now()->subDays(90))->count();  // Bài viết trong 90 ngày qua
        $postsAllTime = Post::count();
        // Trả về view và truyền dữ liệu
        return view('admin_dashboard.index', [
            'countPost' => $countPost,
            'countCategories' => $countCategories,
            'countAdmin' => $countAdmin,
            'countUser' => $countUser,
            'countView' => $viewsAllTime,
            'countComments' => $countComments,
            'countPremium' => $countPremium,
            'viewsLast7Days' => $viewsLast7Days,
            'viewsLast30Days' => $viewsLast30Days,
            'viewsLast90Days' => $viewsLast90Days,
            'viewsAllTime' => $viewsAllTime,
            'commentsLast7Days' => $commentsLast7Days,
            'commentsLast30Days' => $commentsLast30Days,
            'commentsLast90Days' => $commentsLast90Days,
            'postsLast7Days' => $postsLast7Days,
            'postsLast30Days' => $postsLast30Days,
            'postsLast90Days' => $postsLast90Days,
            'postsAllTime' => $postsAllTime,
            'commentsAllTime' => Comment::all()->count(),
        ]);
    }
}

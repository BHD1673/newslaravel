<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PostHistorie;
use App\Http\Services\PostHistorieService;
use App\Models\Post;

class AdminPostHistorieController extends Controller
{
    protected $postHistorieService;
    public function __construct()
    {
        $this->postHistorieService = new PostHistorieService();
    }


    public function index(Request $request)
    {
        $postHistory = $this->postHistorieService->index();
        return view('admin_dashboard.post-history.index', compact('postHistory'));
    }

    public function removeAll()
    {
        PostHistorie::truncate();
        return redirect()->route('admin.post-history.index')->with('success','Xóa lịch sử bài viết thành công.');
    }


    public function destroy(PostHistorie $postHistorie)
    {
        if (!$postHistorie) {
            return redirect()->route('admin.post-history.index')->with('error', 'Bản ghi không tồn tại.');
        }
        $postHistorie->delete();
        return redirect()->route('admin.post-history.index')->with('success','Xóa lịch sử bài viết thành công.');
    }
}

<?php

namespace App\Http\Services;

use App\Models\PostHistorie;
use App\Models\Role;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostHistorieService extends BaseService
{
    public function index()
    {
        if (Auth::user()->role->name === Role::ROLE_ADMIN) {
            $query = PostHistorie::with('user');
            return $query->orderBy('id', 'DESC')->paginate(30);
        }
    }

    public function handleCreatePostHistory(Post $post)
    {
        if ($post) {
            PostHistorie::create([
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'status' => $post->approved,
                'action' => PostHistorie::CREATE,
                'user_action' => Auth::user()->role->name,
                'date_action' => Carbon::now()->toDateString(),
                'time_action' => Carbon::now()->format('H:i'),
                'note' => Auth::user()->role->name . ": thêm mới bài viết."
            ]);
        }
    }

    public function handleEditPostHistory(Post $post)
    {
        if ($post) {
            $status = "";
            if ($post->approved === 1) {
                $status = ": Chỉnh sửa bài viết.";
            }elseif($post->approved === 2){
                $status = ": Từ chối duyệt bài viết";
            }else{
                $status = ": Đã phê duyệt bài viết.";
            }

            PostHistorie::create([
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'status' => $post->approved,
                'action' => PostHistorie::EDIT,
                'date_action' => Carbon::now()->toDateString(),
                'user_action' => Auth::user()->role->name,
                'time_action' => Carbon::now()->format('H:i'),
                'note' => Auth::user()->role->name . $status
            ]);
        }
    }

    public function handleDeletePostHistory(Post $post)
    {
    
        if ($post) {
            PostHistorie::create([
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'status' => $post->approved,
                'action' => PostHistorie::DELETE,
                'date_action' => Carbon::now()->toDateString(),
                'user_action' => Auth::user()->role->name,
                'time_action' => Carbon::now()->format('H:i'),
                'note' => Auth::user()->role->name . ": xóa bài viết."
            ]);

            PostHistorie::where('post_id', $post->id)->update(['is_delete_post' => true]);
        }
    }


    public function handlePostHistory(Post $post)
    {
        if ($post) {
            $status = "";
            if ($post->approved === 1) {
                $status = ": Chỉnh sửa bài viết.";
            }elseif($post->approved === 2){
                $status = ": Từ chối duyệt bài viết";
            }else{
                $status = ": Đã phê duyệt bài viết.";
            }

            PostHistorie::create([
                'title' => $post->title,
                'body' => $post->body,
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'status' => $post->approved,
                'action' => PostHistorie::EDIT,
                'date_action' => Carbon::now()->toDateString(),
                'time_action' => Carbon::now()->format('H:i'),
                'user_action' => Auth::user()->role->name,
                'note' => Auth::user()->role->name . $status . " bài viết."
            ]);
        }
    }

    public function removePostHistory($id)
    {
        if ($id) {
            $params = explode(',', $id);
            $deletedCount = 0;
            foreach ($params as $itemId) {
                $postHistorie = PostHistorie::find($itemId);
                if ($postHistorie) {
                    $postHistorie->delete();
                    $deletedCount++;
                }
            }
            return $deletedCount;
        }
        return 0;
    }
}

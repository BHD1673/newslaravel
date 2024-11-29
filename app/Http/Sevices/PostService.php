<?php

namespace App\Http\Services;

use App\Models\Role;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Image;
use App\Models\PostHistorie;
use App\Models\PostLog;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class PostService extends BaseService
{
    protected $postHistorieService;
    public function __construct()
    {
        $this->postHistorieService = new PostHistorieService();
    }
    public function index()
    {
        $query = Post::with('category');

        if (
            Auth::user()->role->name !== Role::ROLE_ADMIN &&
            Auth::user()->role->name !== Role::ROLE_EMPLOYEE

        ) {
            $query->where('user_id', Auth::id());
        }

        return $query->where("is_delete_post",Post::POST_DELETE['flase'])->orderBy('id', 'DESC')->paginate(20);
    }

    public function getPoStsoftDelete()
    {
        $query = Post::with('category');
        return $query->where("is_delete_post",Post::POST_DELETE['true'])->orderBy('id', 'DESC')->paginate(20);
    }

    public function  store(array $data, $request)
    {
        if(Auth::user()->role->name === Role::ROLE_REPORTER)
        {
            $data['approved'] = Post::APPROVED['not_approved_yet'];
        }else{
            $data['approved'] = (int) $request['approved'];
        }
        $data['user_id'] = auth()->id();
        $post = Post::create($data);
        $this->postHistorieService->handleCreatePostHistory($post);

        if (isset($request['files'])) {
            $this->handleThumbnail($request['files'], $post);
        }

        if (isset($request['tags'])) {
            $this->handleTags($request['tags'], $post);
        }

        return $post;
    }

    public function edit($request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            if (isset($request['approved'])) {
                $request['approved'] = (int) $request['approved'];

                // xóa bản post log khi user status là duyệt bài
                if(isset($request['id_post_log']) && $request['id_post_log'] != null && $request['approved'] ===3 )
                {
                    $postLog = PostLog::find((int) $request['id_post_log']);
                    $postLog->delete();
                }
            }
            $post->update($request);

            if (Auth::user()->role->name === Role::ROLE_EMPLOYEE) {
                $this->postHistorieService->handlePostHistory($post);
            } else {
                $this->postHistorieService->handleEditPostHistory($post);
            }

            // log post
            if(Auth::user()->role->name != Role::ROLE_REPORTER)
            {
                if(isset($request['note']) && $request['approved'] === 2){
                    if($request['note'] != null){
                        // edit post log
                        if($request['id_post_log'] != null)
                        {
                            $postLog = PostLog::find((int) $request['id_post_log']);
                            $postLog->note = $request['note'];
                            $postLog->save();
                        }else{
                            PostLog::create([
                                'user_id' => Auth::user()->id,
                                'post_id' => $post->id,
                                'status' => $post->approved,
                                'role_log' => Auth::user()->role->name,
                                'date_log' => Carbon::now()->toDateString(),
                                'note' => $request['note']
                            ]);
                        }
                    }
                }else{
                    if(empty($request['approved'])){
                        return redirect()->back()->with('error', 'Bạn cần phải nhập lý do từ chối.');
                    }
                }
            }

            if(isset($request['removed_post_images'])){
                if($request['removed_post_images'] != null)
                {
                    $postImgId = explode(',', $request['removed_post_images']);
                    foreach($postImgId as $item)
                    {
                        $image = Image::find($item);
                        if($image){
                            Storage::disk('public')->delete($image->path);
                            $image->delete();
                        }
                    }
                }
           }
           
            if (isset($request['files'])) {
               if(isset($request['removed_post_images'])){
                    $postImgId = explode(',', $request['removed_post_images']);
                    foreach($postImgId as $item)
                    {
                        $image = Image::find($item);
                        if($image){
                            Storage::disk('public')->delete($image->path);
                            $image->delete();
                        }
                    }
               }
                $this->handleThumbnail($request['files'], $post);
            }

            if (isset($request['tags'])) {
                $this->handleTags($request['tags'], $post, $id);
            }
        }

        return $post;
    }


    protected function handleThumbnail($thumbnails, Post $post)
    {
        foreach ($thumbnails as $thumbnail) {
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');
    
            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path,
            ]);
        }
    }

    protected function handleTags($tagsInput, Post $post, $id = 0)
    {
        $tags = explode(',', $tagsInput);
        $tags_ids = [];

        foreach ($tags as $tag) {
            $tag_ob = Tag::create(['name' => trim($tag)]);
            $tags_ids[] = $tag_ob->id;
        }

        if ($id > 0) {
            if (count($tags_ids) > 0)
                $post->tags()->syncWithoutDetaching($tags_ids);
        } else {
            if (count($tags_ids) > 0) {
                $post->tags()->sync($tags_ids);
            }
        }
    }

    public function getCategoryByUser()
    {
        $query = Category::query();
        if (Auth::user()->role->name !== Role::ROLE_ADMIN) {
            $query->where('user_id', Auth::id());
        }
        return $query->pluck('name', 'id');
    }

    public function softDeleteService(Post $post)
    {
        $post = Post::find($post->id);
        if($post)
        {
            $post->is_delete_post = true;
            $post->save();

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
                'note' => Auth::user()->role->name . ": Chuyển bài viết vào thùng rác."
            ]);
        }
    }

    public function undoSoftDeleteService(Post $post)
    {
        $post = Post::find($post->id);
        if($post)
        {
            $post->is_delete_post = false;
            $post->save();

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
                'note' => Auth::user()->role->name . ": Xóa bài viết khỏi thùng rác."
            ]);
        }
    }
}

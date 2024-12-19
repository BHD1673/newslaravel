<?php
namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\AdsPayment;
use App\Models\AdsPosition;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;


class AdsController extends Controller
{
    public function create()
    {
        // Trả về trang tạo quảng cáo với các vị trí quảng cáo
        $positions = AdsPosition::all();
        return view('ads.form', compact('positions'));
    }
    public function store(Request $request)
    {
        // Kiểm tra tính hợp lệ thời gian và vị trí quảng cáo
        $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Chấp nhận các loại file ảnh
            'link' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'position_id' => 'required|exists:ads_position,id',
        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filePath = $file->store('ads_images', 'public'); // Lưu file trong thư mục storage/app/public/ads_images
        } else {
            session()->flash('error', 'Hình ảnh không hợp lệ.');
            return redirect()->back()->withInput();
        }
        
        $overlap = Ads::where('position_id', $request->position_id)
        ->where(function ($query) use ($request) {
            $query->where('start_time', '<', $request->end_time)
                ->where('end_time', '>', $request->start_time);
        })
        ->exists();
    
        if ($overlap) {
            // Lưu thông báo lỗi vào session để sử dụng trong giao diện
            session()->flash('error', 'Quảng cáo đã trùng thời gian và vị trí. Vui lòng chọn lại.');
            return redirect()->back()->withInput(); // Trả lại dữ liệu đã nhập
        }
        

    

        // Tạo quảng cáo
        Ads::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'img' => $filePath, 
            'link' => $request->link,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'position_id' => $request->position_id,
            'status' => 'pending',
        ]);
        
        return redirect()->route('ads.history');
    }
    public function history()
    {
            // Lấy danh sách quảng cáo của người dùng
            $ads = Ads::where('user_id', auth()->id())->with('position')->get();
        
            // Kiểm tra trạng thái quảng cáo, nếu là approved thì gửi email thông báo

        
            // Trả về view với danh sách quảng cáo
            return view('ads.history', compact('ads'));
        }
                public function destroy($id)
            {
                // Tìm quảng cáo theo ID
                $ad = Ads::findOrFail($id);

                // Xóa quảng cáo
                $ad->delete();

                // Trả về lịch sử quảng cáo kèm thông báo thành công
                return redirect()->route('ads.history')->with('success', 'Quảng cáo đã được xóa thành công.');
            }
        public function demo(){
                $posts = Post::latest()
                ->approved()
                // where('approved',1)
                ->withCount('comments')->paginate(8);
            // phân trang 8 bài
            $recent_posts = Post::latest()->take(5)->get();
            $categories = Category::where('name', '!=', 'Chưa phân loại')->orderBy('created_at', 'DESC')->take(10)->get();
            // $categories = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
            $tags = Tag::latest()->take(50)->get();


            /*----- Lấy ra 4 bài viết mới nhất theo các danh mục khác nhau -----*/
            $category_unclassified = Category::where('name', 'Chưa phân loại')->first();
            $posts_new[0] = Post::latest()->approved()
                ->where('category_id', '!=', $category_unclassified->id)
                ->take(1)->get();
            $posts_new[1] = Post::latest()->approved()
                ->where('category_id', '!=', $category_unclassified->id)
                ->where('category_id', '!=', $posts_new[0][0]->category->id)
                ->take(1)->get();
            $posts_new[2] = Post::latest()->approved()
                ->where('category_id', '!=', $category_unclassified->id)
                ->where('category_id', '!=', $posts_new[0][0]->category->id)
                ->where('category_id', '!=', $posts_new[1][0]->category->id)
                ->take(1)->get();
            $posts_new[3] = Post::latest()->approved()
                ->where('category_id', '!=', $category_unclassified->id)
                ->where('category_id', '!=', $posts_new[0][0]->category->id)
                ->where('category_id', '!=', $posts_new[1][0]->category->id)
                ->where('category_id', '!=', $posts_new[2][0]->category->id)
                ->take(1)->get();

            // Lấy ra tin nổi bật -- Lấy theo views
            $outstanding_posts = Post::orderBy('views', 'DESC')->take(5)->get();

            // Lấy ra tất cả danh mục tin tức 
            $stt_home = 0;
            $category_home = Category::where('name', '!=', 'Chưa phân loại')->orderBy('created_at', 'DESC')->take(10)->get();
            foreach ($category_home as $category_item) {
                // Tạo tin tức mới nhất cho layout master
                $stt_home = $stt_home + 1;
                if ($stt_home === 1)
                    $post_category_home0 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(5)->get();
                if ($stt_home === 2)
                    $post_category_home1 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(6)->get();
                if ($stt_home === 3)
                    $post_category_home2 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(8)->get();
                if ($stt_home === 4)
                    $post_category_home3 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(5)->get();
                if ($stt_home === 5)
                    $post_category_home4 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(6)->get();
                if ($stt_home === 6)
                    $post_category_home5 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(5)->get();
                if ($stt_home === 7)
                    $post_category_home6 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(5)->get();
                if ($stt_home === 8)
                    $post_category_home7 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(5)->get();
                if ($stt_home === 9)
                    $post_category_home8 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(8)->get();
                if ($stt_home === 10)
                    $post_category_home9 =  Post::latest()->approved()->withCount('comments')->where('category_id', $category_item->id)->take(4)->get();
            }
            $ads = Ads::with('position')  // Lấy các quảng cáo kèm vị trí
            ->where('status', 'active')  // Quảng cáo đang hoạt động
            ->where('start_time', '<=', now())  // Thời gian bắt đầu hợp lệ
            ->where('end_time', '>=', now())  // Thời gian kết thúc hợp lệ
            ->get();

            // die();



            // Ý kiến người đọc, comments
            $top_commnents = Comment::take(5)->get();

            return view('demo', [
                'posts' => $posts,
                'recent_posts' => $recent_posts,
                'posts_new' => $posts_new, // Bài viết mới nhất theo mục
                'post_category_home0' => $post_category_home0, // Bài viết danh mục 5
                'post_category_home1' => $post_category_home1, // Bài viết danh mục 1
                'post_category_home2' => $post_category_home2, // Bài viết danh mục 2
                'post_category_home3' => $post_category_home3, // Bài viết danh mục 3
                'post_category_home4' => $post_category_home4, // Bài viết danh mục 4
                'post_category_home5' => $post_category_home5, // Bài viết danh mục 10
                'post_category_home6' => $post_category_home6, // Bài viết danh mục 6
                'post_category_home7' => $post_category_home7, // Bài viết danh mục 7
                'post_category_home8' => $post_category_home8, // Bài viết danh mục 8
                'post_category_home9' => $post_category_home9, // Bài viết danh mục 9
                'outstanding_posts' => $outstanding_posts, // Bài viết nỗi bật
                'categories' => $categories,
                'category_home' => $category_home,
                'tags' => $tags,
                'top_commnents' => $top_commnents, // Lấy ý kiến người đọc mới nhất
                'ads' => $ads,
            ]);
    }
}

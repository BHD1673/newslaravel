<?php
namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\AdsPayment;
use App\Models\AdsPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdApprovedMail;
use App\Mail\AdCancelledMail;
use App\Mail\AdRunningMail;
use App\Mail\AdCompletedMail;
use Carbon\Carbon;

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
            'img' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'position_id' => 'required|exists:ads_position,id',
        ]);
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
            'img' => $request->img,
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


    
        }

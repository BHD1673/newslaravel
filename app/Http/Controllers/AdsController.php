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
        // public function index()
        // {
           
        //     // dd($ads);
        //     return view('home', compact('ads'));
        // }


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
            'position' => 'required|in:top,center,bottom,detail',
        ]);

      // Kiểm tra trùng thời gian và vị trí
                $overlap = Ads::where('position', $request->position)
                ->where(function ($query) use ($request) {
                    // Quảng cáo mới bắt đầu trước khi quảng cáo cũ kết thúc
                    $query->where('start_time', '<', $request->end_time)
                        // Quảng cáo mới kết thúc sau khi quảng cáo cũ bắt đầu
                        ->where('end_time', '>', $request->start_time);
                })
                ->exists();
            
            if ($overlap) {
                // Nếu có trùng, trả về thông báo lỗi
                return redirect()->back()->with('error', 'Quảng cáo đã trùng thời gian và vị trí. Vui lòng chọn lại.');
            }

  


        // Tính toán giá tiền quảng cáo
        $position_price = AdsPosition::where('position', $request->position)->first()->price;
        $hours = Carbon::parse($request->start_time)->diffInHours(Carbon::parse($request->end_time));
        $total_price = $position_price * $hours;

        // Tạo quảng cáo
        $ad = Ads::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'img' => $request->img,
            'link' => $request->link,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'position' => $request->position,
            'status' => 'pending',
        ]);

        return redirect()->route('ads.history');
    }

    public function history()
    {
        // Lấy danh sách quảng cáo của người dùng
        $ads = Ads::where('user_id', auth()->id())->get();
    
        // Kiểm tra trạng thái quảng cáo, nếu là approved thì gửi email thông báo
        foreach ($ads as $ad) {
            // Kiểm tra nếu quảng cáo có trạng thái 'approved' và chưa gửi email
            if ($ad->status === 'approved' && !$ad->email_sent) {
                // Gửi email thông báo quảng cáo đã được phê duyệt
                Mail::to($ad->user->email)->send(new AdApprovedMail($ad)); // Truyền $ad vào email
    
                // Cập nhật trường email_sent để đảm bảo chỉ gửi một lần
                $ad->email_sent = true;
                $ad->save();
            }
    
            // Kiểm tra nếu quảng cáo đã phê duyệt và có giao dịch thanh toán trong bảng ads_payment
            if ($ad->status === 'approved') {
                // Kiểm tra trong bảng ads_payment xem có giao dịch nào với quảng cáo này chưa
                $paymentExist = AdsPayment::where('ad_id', $ad->id)->exists();
    
                // Nếu đã thanh toán, kiểm tra thời gian và cập nhật trạng thái quảng cáo
                if ($paymentExist) {
                    $currentTime = Carbon::now(); // Lấy thời gian hiện tại
                    $endTime = Carbon::parse($ad->end_time); // Lấy thời gian kết thúc của quảng cáo
    
                    // Nếu quảng cáo đã hết hạn và đã thanh toán
                    if ($currentTime > $endTime) {
                        $ad->status = 'completed'; // Cập nhật trạng thái thành 'completed'
                        $ad->save();
                        
                        // Gửi email thông báo cho người dùng về việc quảng cáo đã hoàn thành
                        Mail::to($ad->user->email)->send(new AdCompletedMail($ad)); // Tạo Mailable mới để gửi thông báo hoàn thành quảng cáo
                    }
                    // Nếu quảng cáo đang trong thời gian chạy và đã thanh toán
                    elseif ($currentTime >= Carbon::parse($ad->start_time) && $currentTime <= $endTime) {
                        $ad->status = 'running'; // Cập nhật trạng thái thành 'running'
                        $ad->save();
    
                        // Gửi email thông báo cho người dùng về việc quảng cáo đang chạy
                        Mail::to($ad->user->email)->send(new AdRunningMail($ad)); // Tạo Mailable mới để gửi thông báo quảng cáo đang chạy
                    }
                }
                // Nếu chưa có thanh toán và thời gian còn lại ít hơn 8 tiếng
                else {
                    $endTime = Carbon::parse($ad->end_time); // Lấy thời gian kết thúc
                    $currentTime = Carbon::now(); // Lấy thời gian hiện tại
    
                    // Sự khác biệt giữa thời gian hiện tại và thời gian kết thúc
                    $timeDiff = $endTime->diff($currentTime);
    
                    // Tính tổng thời gian chênh lệch theo giờ và ngày
                    $totalTimeInHours = $timeDiff->days * 24 + $timeDiff->h; // Tổng số giờ = (số ngày * 24) + số giờ
                    $totalTimeInMinutes = $totalTimeInHours * 60 + $timeDiff->i; // Tổng số phút
    
                    // Kiểm tra nếu thời gian còn lại ít hơn hoặc bằng 8 tiếng (480 phút) và chưa thanh toán
                    if ($totalTimeInMinutes <= 480) {
                        // Chuyển trạng thái quảng cáo sang 'cancelled'
                        $ad->status = 'cancelled';
                        $ad->save();
    
                        // Gửi email thông báo cho người dùng về việc quảng cáo đã bị hủy
                        Mail::to($ad->user->email)->send(new AdCancelledMail($ad)); // Tạo Mailable mới để gửi thông báo hủy quảng cáo
                    }
                }
            }
        }
    
        // Trả về view với danh sách quảng cáo
        return view('ads.history', compact('ads'));
    }
    

    
        }

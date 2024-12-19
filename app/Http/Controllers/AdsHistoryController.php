<?php
namespace App\Http\Controllers;

use App\Models\AdsHistory;
use App\Models\Ads;
use App\Models\AdsPosition;
use Illuminate\Http\Request;


class AdsHistoryController extends Controller
{
    public function index()
    {
        // Lấy lịch sử quảng cáo
        $ads_history = AdsHistory::where('user_id', auth()->id())->get();
        return view('ads.history', compact('ads_history'));
    }

    public function cancel($ad_id)
    {
        $ad = Ads::findOrFail($ad_id);
        $ad->status = 'cancelled';
        $ad->save();

        // Lưu vào bảng lịch sử
        AdsHistory::create([
            'ad_id' => $ad->id,
            'status' => 'cancelled',
            'action_taken' => 'cancelled',
            'refund_amount' => $ad->paid_amount * 0.8,
        ]);

        return redirect()->route('ads.history');
    }
        public function pricing()
        {
            $positions = AdsPosition::all(); // Lấy toàn bộ dữ liệu từ bảng ads_position
            return view('pricing.format', compact('positions'));
        }
        public function showByFormat($format)
    {
        // Lấy danh sách lịch sử quảng cáo theo user hiện tại và format
        $ads = Ads::where('user_id', auth()->id())
        ->whereHas('position', function ($query) use ($format) {
            $query->where('position', $format);
        })
        ->get();
        

        return view('pricing.history_by_format', compact('ads', 'format'));
    }
    
}

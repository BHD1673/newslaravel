<?php
namespace App\Http\Controllers;

use App\Models\AdsHistory;
use App\Models\Ads;
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
}

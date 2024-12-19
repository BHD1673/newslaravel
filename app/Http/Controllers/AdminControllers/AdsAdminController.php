<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\AdsPosition;
use App\Models\AdsPayment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdApprovedMail;
use App\Mail\AdCancelledMail;
use App\Mail\AdRunningMail;
use App\Mail\AdCompletedMail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdsAdminController extends Controller
{
    public function index()
    {
        $ads = Ads::with('position')->get();
        return view('admin_dashboard.ads.index', compact('ads'));
    }

    public function create()
    {
        $positions = AdsPosition::all();
        $users = User::all(); // Lấy toàn bộ người dùng để hiển thị

        return view('admin_dashboard.ads.create', compact('positions','users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'img' => 'required|url',
            'link' => 'nullable|url',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'position_id' => 'required|exists:ads_position,id',
            'status' => 'required|in:pending,approved,active,cancelled,completed,Running',
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

        Ads::create($validated);
        return redirect()->route('admin.ads.index')->with('success', 'Ad created successfully.');
    }

    public function edit($id)
    {
        $ad = Ads::findOrFail($id);
        $positions = AdsPosition::all();
        $users = User::all(); // Lấy toàn bộ người dùng để hiển thị

        return view('admin_dashboard.ads.edit', compact('ad', 'positions','users'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'img' => 'required|url',
            'link' => 'nullable|url',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'position_id' => 'required|exists:ads_position,id',
            'status' => 'required|in:pending,approved,active,cancelled,completed,running',
        ]);
    
        // Kiểm tra trùng thời gian với các quảng cáo khác (trừ quảng cáo hiện tại)
        $overlap = Ads::where('position_id', $validated['position_id'])
            ->where('id', '!=', $id) // Loại trừ quảng cáo hiện tại
            ->where(function ($query) use ($validated) {
                $query->where('start_time', '<', $validated['end_time'])
                    ->where('end_time', '>', $validated['start_time']);
            })
            ->exists();
    
        if ($overlap) {
            session()->flash('error', 'Quảng cáo đã trùng thời gian và vị trí. Vui lòng chọn lại.');
            return redirect()->back()->withInput();
        }
    
        // Lấy quảng cáo hiện tại
        $ad = Ads::findOrFail($id);
    
        // Kiểm tra thay đổi trạng thái
        $previousStatus = $ad->status;
        $ad->update($validated);
    
        // Gửi email theo từng trạng thái
        if ($ad->status !== $previousStatus) {
            switch ($ad->status) {
                case 'approved':
                    if (!$ad->email_sent) {
                        Mail::to($ad->user->email)->send(new AdApprovedMail($ad));
                        $ad->email_sent = true;
                        $ad->save();
                    }
                    break;
    
                case 'running':
                    Mail::to($ad->user->email)->send(new AdRunningMail($ad));
                    break;
    
                case 'completed':
                    Mail::to($ad->user->email)->send(new AdCompletedMail($ad));
                    break;
    
                case 'cancelled':
                    Mail::to($ad->user->email)->send(new AdCancelledMail($ad));
                    break;
    
                case 'pending':
                    Mail::to($ad->user->email)->send(new AdPendingMail($ad));
                    break;
    
                default:
                    break;
            }
        }
    
        return redirect()->route('admin.ads.index')->with('success', 'Ad updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $ad = Ads::findOrFail($id);
        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Ad deleted successfully.');
    }
}

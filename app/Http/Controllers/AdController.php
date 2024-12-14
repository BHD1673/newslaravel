<?php

// app/Http/Controllers/AdController.php
namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdController extends Controller
{
    public function showAdForm()
    {
        // Lấy các vị trí quảng cáo và khung giờ
        $positions = ['top_banner', 'center_banner', 'bottom_banner'];
        $timeSlots = ['morning', 'noon', 'evening', 'night'];

        return view('ads.form', compact('positions', 'timeSlots'));
    }

    public function checkAvailability(Request $request)
    {
        // Kiểm tra vị trí và thời gian
        $position = $request->input('position');
        $timeSlot = $request->input('time_slot');
        $date = Carbon::parse($request->input('date'));

        // Kiểm tra nếu đã có quảng cáo đặt vào vị trí và khung giờ này
        $adSchedule = AdSchedule::whereHas('ad', function ($query) use ($position) {
            $query->where('position', $position);
        })
        ->where('time_slot', $timeSlot)
        ->whereDate('created_at', $date->format('Y-m-d'))
        ->first();

        if ($adSchedule && $adSchedule->is_booked) {
            return response()->json(['available' => false, 'message' => 'Khung giờ đã được đặt']);
        }

        return response()->json(['available' => true, 'message' => 'Khung giờ còn trống']);
    }

    public function store(Request $request)
    {
        // Lưu thông tin quảng cáo và tạo lịch
        $validated = $request->validate([
            'position' => 'required|in:top_banner,center_banner,bottom_banner',
            'title' => 'required|string|max:255',
            'image_url' => 'required|url',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        dd($request->all());

        $ad = Ad::create([
            'user_id' => auth()->id(),
            'position' => $validated['position'],
            'title' => $validated['title'],
            'image_url' => $validated['image_url'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => 'pending',
        ]);

        // Tạo lịch quảng cáo cho các khung giờ
        $timeSlots = ['morning', 'noon', 'evening', 'night'];
        foreach ($timeSlots as $slot) {
            AdSchedule::create([
                'ad_id' => $ad->id,
                'time_slot' => $slot,
                'is_booked' => false,  // Ban đầu là chưa có quảng cáo
            ]);
        }

        return redirect()->route('ads.history')->with('success', 'Đăng ký quảng cáo thành công!');
    }
}

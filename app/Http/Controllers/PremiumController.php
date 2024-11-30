<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;

class PremiumController extends Controller
{
    public function upgrade()
    {
        $user = auth()->user();

        // Kiểm tra nếu người dùng đã là Premium
        if ($user->is_premium && $user->premium_expires_at > Carbon::now()) {
            return redirect()->route('premium')->with('message', 'Bạn đã là thành viên Premium.');
        }

        // Cập nhật trạng thái Premium
        $user->update([
            'is_premium' => true,
            'premium_expires_at' => now()->addMonth(), // Hiệu lực 1 tháng
        ]);

        // Lưu lịch sử vào bảng subscriptions
        Subscription::create([
            'user_id' => $user->id,
            'plan_name' => 'Monthly Premium',
            'price' => 199000,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
        ]);

        return redirect()->route('premium');
    }
}
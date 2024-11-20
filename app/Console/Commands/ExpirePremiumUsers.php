<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ExpirePremiumUsers extends Command
{
    protected $signature = 'premium:expire';
    protected $description = 'Kiểm tra và cập nhật trạng thái Premium hết hạn (theo giờ Việt Nam)';

    public function handle()
    {
        // Lấy giờ hiện tại theo múi giờ Việt Nam
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        // Lấy danh sách người dùng Premium đã hết hạn
        $expiredUsers = User::where('is_premium', true)
            ->where('premium_expires_at', '<', $now) // So sánh với giờ Việt Nam
            ->get();

        foreach ($expiredUsers as $user) {
            try {
                // Cập nhật trạng thái Premium
                $user->update([
                    'is_premium' => false,
                    'premium_expires_at' => null,
                ]);

                $this->info("User {$user->id} ({$user->email}) đã hết hạn Premium lúc {$user->premium_expires_at->setTimezone('Asia/Ho_Chi_Minh')}.");
            } catch (\Exception $e) {
                $this->error("Không thể cập nhật cho User {$user->id}: {$e->getMessage()}");
            }
        }

        // Thông báo khi hoàn thành
        $this->info('Hoàn thành việc kiểm tra và cập nhật Premium.');
        return 0;
    }
}

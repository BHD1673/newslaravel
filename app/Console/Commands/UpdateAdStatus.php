<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ads;
use App\Mail\AdCompletedMail;
use App\Mail\AdRunningMail;
use App\Mail\AdCancelledMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UpdateAdStatus extends Command
{
    protected $signature = 'ads:update-status';
    protected $description = 'Cập nhật trạng thái quảng cáo dựa trên thời gian và trạng thái thanh toán';

    public function handle()
    {
        $ads = Ads::whereIn('status', ['approved', 'running'])->get();

        foreach ($ads as $ad) {
            $currentTime = Carbon::now();
            $startTime = Carbon::parse($ad->start_time);
            $endTime = Carbon::parse($ad->end_time);

            if ($currentTime > $endTime) {
                $ad->status = 'completed';
                $ad->save();
                Mail::to($ad->user->email)->send(new AdCompletedMail($ad));
            } elseif ($currentTime >= $startTime && $currentTime <= $endTime) {
                if ($ad->status !== 'running') {
                    $ad->status = 'running';
                    $ad->save();
                    Mail::to($ad->user->email)->send(new AdRunningMail($ad));
                }
            } else {
                $timeDiff = $startTime->diff($currentTime);
                $totalTimeInMinutes = ($timeDiff->days * 24 * 60) + ($timeDiff->h * 60) + $timeDiff->i;

                if ($totalTimeInMinutes <= 480 && !$ad->payment) {
                    $ad->status = 'cancelled';
                    $ad->save();
                    Mail::to($ad->user->email)->send(new AdCancelledMail($ad));
                }
            }
        }

        $this->info('Ads statuses updated successfully!');
    }
}


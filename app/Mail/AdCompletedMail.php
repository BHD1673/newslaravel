<?php

namespace App\Mail;

use App\Models\Ads;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ad;

    /**
     * Tạo một thông báo mới.
     *
     * @param Ads $ad
     * @return void
     */
    public function __construct(Ads $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Xây dựng thông báo.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Quảng cáo của bạn đã hoàn thành')->view('emails.ads_completed')
            ->with([
                'adTitle' => $this->ad->title,
                'startTime' => $this->ad->start_time,
                'endTime' => $this->ad->end_time,
            ]);
    }
}
<?php
// AdApprovedMail.php

namespace App\Mail;

use App\Models\Ads;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ad; // Lưu trữ đối tượng quảng cáo

    public function __construct(Ads $ad)
    {
        $this->ad = $ad; // Truyền đối tượng quảng cáo vào constructor
    }

    public function build()
    {
        return $this->view('emails.ad_approved')
                    ->from('thiendvph42781@fpt.edu.vn', 'FPT NewWeb -- Thông Báo') 
                    ->subject('Thông báo phê duyệt quảng cáo')
                    ->with([
                        'adTitle' => $this->ad->title,
                        'adImg' => $this->ad->img,
                        'adLink' => route('ads.payment', $this->ad->id),
                        'adStartTime' => $this->ad->start_time,
                        'adEndTime' => $this->ad->end_time,
                        'adPosition' => $this->ad->position,
                        'adStatus' => $this->ad->status,
                        'adId' => $this->ad->id,
                    ]);
    }
}

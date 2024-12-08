<?php

namespace App\Mail;

use App\Models\Ads;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ad;

    public function __construct(Ads $ad)
    {
        $this->ad = $ad;
    }

    public function build()
    {
        return $this->view('emails.ad_cancelled') // Sử dụng view email thông báo hủy
                    ->from('thiendvph42781@fpt.edu.vn', 'FPT NewWeb -- Thông Báo') // Đặt tên người gửi và địa chỉ email
                    ->subject('Thông báo hủy quảng cáo') // Tiêu đề email
                    ->with([
                        'adTitle' => $this->ad->title,
                        'adLink' => route('ads.history', $this->ad->id), // Link đến trang history
                        'adId' => $this->ad->id,
                    ]);
    }
}

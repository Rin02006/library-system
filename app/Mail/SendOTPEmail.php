<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTPEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Your Library Login OTP')
                    ->html('<h2>Your One-Time Password</h2><p>Your OTP is: <b>' . $this->otp . '</b></p><p>This code expires in 5 minutes.</p>');
    }
}
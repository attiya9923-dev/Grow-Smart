<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $otp;
    public string $language;

    public function __construct(string $name, string $otp, string $language = 'en')
    {
        $this->name = $name;
        $this->otp = $otp;
        $this->language = $language === 'ur' ? 'ur' : 'en';
    }

    public function build()
    {
        $subject = trans('GrowSmart Email Verification', [], $this->language);

        return $this->subject($subject)
                    ->view('emails.otp');
    }
}

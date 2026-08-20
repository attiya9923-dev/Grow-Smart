<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;

    public function __construct(
        private string $token,
        private string $language = 'en'
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $url = url('/reset-password/'.$this->token.'?email='.urlencode($notifiable->email).'&lang='.$this->language);

        if ($this->language === 'ur') {
            return (new MailMessage)
                ->subject('پاس ورڈ دوبارہ ترتیب دینے کی درخواست')
                ->greeting('السلام علیکم '.$notifiable->name)
                ->line('آپ کے گرو اسمارٹ اکاؤنٹ کے پاس ورڈ کو دوبارہ ترتیب دینے کی درخواست موصول ہوئی ہے۔')
                ->action('پاس ورڈ دوبارہ ترتیب دیں', $url)
                ->line('یہ لنک محدود مدت کے لیے قابل استعمال ہے۔')
                ->line('اگر آپ نے یہ درخواست نہیں کی تو اس ای میل کو نظر انداز کر دیں۔')
                ->salutation('گرو اسمارٹ ٹیم');
        }

        return (new MailMessage)
            ->subject('GrowSmart Password Reset Request')
            ->greeting('Hello '.$notifiable->name)
            ->line('You requested to reset your GrowSmart account password.')
            ->action('Reset Password', $url)
            ->line('This link is valid for a limited time.')
            ->line('If you did not request this, you can ignore this email.')
            ->salutation('GrowSmart Team');
    }
}

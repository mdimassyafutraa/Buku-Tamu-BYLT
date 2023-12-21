<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $resetPasswordUrl = $this->resetUrl($notifiable);

        return (new MailMessage)
            ->subject('Notifikasi Reset Password')
            ->greeting('Halo!')
            ->line('Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.')
            ->line('Klik tombol di bawah ini untuk reset password Anda')
            ->action('Reset Password', $resetPasswordUrl)
            ->line('Jika Anda tidak melakukan permintaan reset password, Anda tidak perlu melakukan tindakan lebih lanjut.')
            ->salutation('Hormat Kami UPT Balai Yasa Lahat');
    }

    protected function resetUrl($notifiable)
    {
        return URL::signedRoute('password.reset', [
            'token' => Password::createToken($notifiable),
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SupportTicket extends Notification implements ShouldQueue
{
    use Queueable;

    private $email;
    private $phone;
    private $subject;
    private $message;

    /**
     * SupportTicket constructor.
     *
     * @param $email
     * @param $phone
     * @param $subject
     * @param $message
     */
    public function __construct($email, $phone, $subject, $message)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Support Ticket')
            ->line('Email: ' . $this->email)
            ->line('Phone: ' . $this->phone)
            ->line('Subject: ' . $this->subject)
            ->line('Message: ' . $this->message);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

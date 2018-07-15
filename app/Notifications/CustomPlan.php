<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomPlan extends Notification implements ShouldQueue
{
    use Queueable;

    private $admin;
    private $company;
    private $message;

    /**
     * IqTest constructor.
     */
    public function __construct($admin, $company, $message)
    {
        $this->admin = $admin;
        $this->company = $company;
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
            ->line('Admin name: ' . $this->admin['first_name'] . ' ' . $this->admin['last_name'])
            ->line('Email: ' . $this->admin['email'])
            ->line('Phone: ' . $this->admin['phone'])
            ->line('Company name: ' . $this->company['name'])
            ->line('Website: ' . $this->company['website'])
            ->line('City: ' . $this->company['city'])
            ->line('Phone: ' . $this->company['phone'])
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

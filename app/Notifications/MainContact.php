<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MainContact extends Notification implements ShouldQueue
{
    use Queueable;

    private $name;
    private $email;
    private $phone;
    private $company;
    private $type;
    private $message;

    /**
     * MainContact constructor.
     *
     * @param $name
     * @param $email
     * @param $phone
     * @param $company
     * @param $type
     * @param $message
     */
    public function __construct($name, $email, $phone, $company, $type, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->company = $company;
        $this->type = $type;
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
            ->line('Name: ' . $this->name)
            ->line('Email: ' . $this->email)
            ->line('Phone: ' . $this->phone)
            ->line('Company name: ' . $this->company)
            ->line('Comapny type: ' . $this->type)
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

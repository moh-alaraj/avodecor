<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactCreatedNotification extends Notification
{

    protected $contacts;
    use Queueable;


    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line('New Message From Client ')
                     ->greeting('مرحبا' .   $notifiable->name)
                    ->action('Check Messages', url('/'))
                    ->line('Thank you for Contacting us!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title'     => 'New Message',
            'body'      => 'user contact us',
            'icon'      => asset('website/img/header/Logo@2x.png'),

        ];
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

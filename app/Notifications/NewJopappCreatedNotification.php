<?php

namespace App\Notifications;

use App\Models\JoinJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJopappCreatedNotification extends Notification
{
    use Queueable;

    protected $jobs;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(JoinJob $jobs)
    {
        $this->jobs = $jobs;
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
                    ->subject('New Job Application')
                    ->greeting('مرحبا'  .   $notifiable->name)
                    ->line('New Jop application attachment.')
                    ->action('check CV', url('/'))
                    ->line('Thank you');
    }
    public function toDatabase($notifiable){
        return[
            'title'     => 'New Application',
            'greeting'  => 'مرحبا'  . $notifiable->name,
            'body'      => 'New user attach CV',
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

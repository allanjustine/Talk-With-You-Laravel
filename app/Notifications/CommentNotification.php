<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;
    protected $commentor;
    protected $commentorId;
    protected $post;

    /**
     * Create a new notification instance.
     */
    public function __construct($post)
    {
        $commentor = auth()->user();
        $commentorId = auth()->id();

        $this->commentor = $commentor;
        $this->commentorId = $commentorId;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'commentor_name' => $this->commentor->name,
            'commentor_picture' => $this->commentor->profile_image,
            'commentor_id' => $this->commentor->id,
            'post_id' => $this->post->id,
        ];
    }
}

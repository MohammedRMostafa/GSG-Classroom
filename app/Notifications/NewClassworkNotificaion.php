<?php

namespace App\Notifications;

use App\Models\Classwork;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewClassworkNotificaion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Classwork $classwork)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $classwork = $this->classwork;
        $content = __(':name posted a new :type: :title', [
            'name' => $classwork->user->name,
            'type' => __($classwork->type),
            'title' => $classwork->title,
        ]);
        return (new MailMessage)
            ->subject(__('New :type', [
                'type' => $classwork->type,
            ]))
            ->greeting(__('Hi :name', [
                'name' => $notifiable->name,
            ]))
            ->line($content)
            ->action(__('Go to classwork'), route('classrooms.classworks.show', [$classwork->classroom_id, $classwork->id]))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $classwork = $this->classwork;
        $content = __(':name posted a new :type: :title', [
            'name' => $classwork->user->name,
            'type' => __($classwork->type),
            'title' => $classwork->title,
        ]);
        return [
            'title' => __('New :type', [
                'type' => $classwork->type,
            ]),
            'body' =>  $content,
            'image' =>  '',
            'link' =>  route('classrooms.classworks.show', [$classwork->classroom_id, $classwork->id]),
            'classwork' => $classwork->id,
        ];
    }
}
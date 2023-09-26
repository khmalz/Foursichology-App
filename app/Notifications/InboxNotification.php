<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class InboxNotification extends Notification
{
    use Queueable;
    public $role, $report_id, $status;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $role, string|int $report_id, string $status)
    {
        $this->role = $role;
        $this->report_id = $report_id;
        $this->status = $status;
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'role' => $this->role,
            'report_id' => $this->report_id,
            'status' => $this->status
        ];
    }
}

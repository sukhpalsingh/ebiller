<?php

namespace App\Notifications;

use App\Http\Controllers\AuthorisationController;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AuthorisationExpiring extends Notification
{
    private $expiringAuthorisations;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($expiringAuthorisations)
    {
        $this->expiringAuthorisations = $expiringAuthorisations;
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
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      return (new MailMessage)->view(
        'emails.expiring-autorisations',
        [
          'expiringAuthorisations' => $this->expiringAuthorisations,
          'types' => AuthorisationController::$types
        ]
      )
        ->subject('Ebiller Expiring Authorisations Notification');
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

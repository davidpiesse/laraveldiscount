<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class NewOfferLaunched extends Notification
{
    use Queueable;
    
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    public function toTwitter($notifiable)
    {
        dump((new TwitterStatusUpdate("New Offer! ".  $notifiable->twitterMessage()))->withImage($notifiable->product->logoUrl));
        return;
    }

}

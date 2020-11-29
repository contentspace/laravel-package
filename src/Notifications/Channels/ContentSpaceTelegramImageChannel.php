<?php

namespace ContentSpace\Notifications\Channels;

use Illuminate\Notifications\Notification;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpaceTelegramImageChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $messages = $notification->toContentSpaceTelegramImage($notifiable);
        foreach ($messages as $message) {
            ContentSpaceService::sendImageToTelegramChannel(
                $message->getApplication(),
                $message->getChannel(),
                $message->getCaption(),
                $message->getImages()
            );
        }
    }
}
<?php

namespace ContentSpace\Notifications\Channels;

use Illuminate\Notifications\Notification;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpaceTelegramChannel
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
        $messages = $notification->toContentSpaceTelegram($notifiable);
        foreach ($messages as $message) {
            ContentSpaceService::sendMessageToTelegramChannel(
                $message->getApplication(),
                $message->getChannel(),
                $message->getContent()
            );
        }
    }
}
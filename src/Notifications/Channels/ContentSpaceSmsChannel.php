<?php

namespace ContentSpace\Notifications\Channels;

use Illuminate\Notifications\Notification;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpaceSmsChannel
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
        $messages = $notification->toContentSpaceSms($notifiable);
        foreach ($messages as $message) {
            ContentSpaceService::sendSMS(
                $message->getApplication(),
                $message->getMobile(),
                $message->getContent()
            );
        }
    }
}
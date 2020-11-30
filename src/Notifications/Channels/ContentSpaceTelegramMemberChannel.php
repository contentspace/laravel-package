<?php

namespace ContentSpace\Notifications\Channels;

use Illuminate\Notifications\Notification;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpaceTelegramMemberChannel
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
        $messages = $notification->toContentSpaceTelegramMember($notifiable);
        foreach ($messages as $message) {
            ContentSpaceService::sendMessageToTelegramMember(
                $message->getApplication(),
                $message->getBotId(),
                $message->getMemberId(),
                $message->getContent()
            );
        }
    }
}
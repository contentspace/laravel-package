<?php

namespace ContentSpace\Notifications\Channels;

use Illuminate\Notifications\Notification;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpaceTelegramDocumentChannel
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
        $messages = $notification->toContentSpaceTelegramDocument($notifiable);
        foreach ($messages as $message) {
            ContentSpaceService::sendDocumentToTelegramChannel(
                $message->getApplication(),
                $message->getChannel(),
                $message->getCaption(),
                $message->getDocuments()
            );
        }
    }
}
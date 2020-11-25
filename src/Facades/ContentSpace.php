<?php

namespace ContentSpace\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use ContentSpace\Notifications\Services\ContentSpaceService;

class ContentSpace extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'content-space';
    }

    /**
     * send sms message to content space server
     * 
     * @param string $application application name in the configuration
     * @param string $mobile mobile number to send message to
     * @param string $text the mesage to be send
     * 
     * 
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendSms(string $application, string $mobile, string $text): int
    {
        return ContentSpaceService::sendSms($application, $mobile, $text);
    }

    /**
     * send telegram channel message to content space server
     * 
     * @param string $application application name in the configuration
     * @param string $text the mesage to be send
     * 
     * 
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendMessageToTelegramChannel(string $application, string $channel, string $text): int
    {
        return ContentSpaceService::sendMessageToTelegramChannel($application, $channel, $text);

    }
}
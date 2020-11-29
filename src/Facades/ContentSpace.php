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
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendMessageToTelegramChannel(string $application, string $channel, string $text): int
    {
        return ContentSpaceService::sendMessageToTelegramChannel($application, $channel, $text);

    }

    /**
     * send telegram channel image message to content space server
     * 
     * @param string $application application name in the configuration
     * @param string $text the mesage to be send
     * @param array $images public url of images
     * 
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendImageToTelegramChannel(string $application, string $channel, string $text, array $images): int
    {
        return ContentSpaceService::sendImageToTelegramChannel($application, $channel, $text, $images);

    }

    /**
     * send telegram channel document message to content space server
     * 
     * @param string $application application name in the configuration
     * @param string $text the mesage to be send
     * @param array $coduments public url of documents, currently only one document supported
     * 
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendDocumentToTelegramChannel(string $application, string $channel, string $text, array $documents): int
    {
        return ContentSpaceService::sendDocumentToTelegramChannel($application, $channel, $text, $documents);

    }

    /**
     * send telegram bot message to content space server
     * 
     * @param string $application application name in the configuration
     * @param int $botId the bot id in content space server
     * @param int $memberId member id in content space server
     * @param string $text the mesage to be send
     * 
     * @retval int the number of sent message in content space server, or 0 if fails to send
     */
    public static function sendMessageToTelegramMember(string $application, int $botId, int $memberId, string $text): int
    {
        return ContentSpaceService::sendMessageToTelegramMember($application, $botId, $memberId, $text);

    }
}
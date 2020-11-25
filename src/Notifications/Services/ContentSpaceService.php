<?php

namespace ContentSpace\Notifications\Services;
use Illuminate\Support\Facades\Http;

class ContentSpaceService
{
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
        $config = config('content-space');

        if (!isset($config['baseUrl']) || !is_string($config['baseUrl'])) {
            // TODO: throw or log
            return 0;
        }

        if (
            !$config
            || !is_array($config)
            || !isset($config['applications'])
            || !is_array($config['applications'])
            || !isset($config['applications'][$application])
            || !is_array($config['applications'][$application])
            || !isset($config['applications'][$application]['token'])
            || empty($config['applications'][$application]['token'])
        ) {
            // TODO: throw or log
            return 0;
        }

        $token = $config['applications'][$application]['token'];
        $url = $config['baseUrl'];
        $response = Http::post($url . '/api/v1/app/' . $token . '/sms/message', [
            'mobile' => $mobile,
            'message' => $text
        ]);

        $responseObject = $response->json();
        if (!$responseObject || !isset($responseObject['status']) || !is_int($responseObject['status'])) {
            // TODO: log bad format data
            return 0;
        }

        switch ($responseObject['status']) {
            case 201:
                return $responseObject['result'];
            default:
                // TODO: log error, $responseObject['message']
                return 0;
        }
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
        $config = config('content-space');

        if (!isset($config['baseUrl']) || !is_string($config['baseUrl'])) {
            // TODO: throw or log
            return 0;
        }

        if (
            !$config
            || !is_array($config)
            || !isset($config['applications'])
            || !is_array($config['applications'])
            || !isset($config['applications'][$application])
            || !is_array($config['applications'][$application])
            || !isset($config['applications'][$application]['token'])
            || empty($config['applications'][$application]['token'])
        ) {
            // TODO: throw or log
            return 0;
        }
        $token = $config['applications'][$application]['token'];

        if (
            !isset($config['applications'][$application]['telegramChannels'])
            || !is_array($config['applications'][$application]['telegramChannels'])
            || !isset($config['applications'][$application]['telegramChannels'][$channel])
            || !is_array($config['applications'][$application]['telegramChannels'][$channel])
            || !isset($config['applications'][$application]['telegramChannels'][$channel]['id'])
            || !is_int($config['applications'][$application]['telegramChannels'][$channel]['id'])
        ) {
            // TODO: log channel id is wrong
            return 0;
        }
        $channelId = $config['applications'][$application]['telegramChannels'][$channel]['id'];

        $url = $config['baseUrl'];
        $response = Http::post($url . '/api/v1/app/' . $token . '/telegram/channel/' . $channelId . '/message', [
            'text' => $text
        ]);

        $responseObject = $response->json();
        if (!$responseObject || !isset($responseObject['status']) || !is_int($responseObject['status'])) {
            // TODO: log bad format data
            return 0;
        }

        switch ($responseObject['status']) {
            case 201:
                return $responseObject['result'];
            default:
                // TODO: log error, $responseObject['message']
                return 0;
        }
    }
}

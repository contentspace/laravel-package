<?php

namespace ContentSpace\Notifications\Messages;

class ContentSpaceTelegramMessage
{
    /**
     * @var string
     */
    private $_application;

    /**
     * @var string
     */
    private $_channel;

    /**
     * @var string
     */
    private $_content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $application, string $channel, string $content)
    {
        $this->_content = $content;
        $this->_application = $application;
        $this->_channel = $channel;
    }

    /**
     * @return string
     */
    public function getApplication(): string
    {
        return $this->_application;
    }

    /**
     * @param string $application
     * @return $this
     */
    public function setApplication(string $application): ContentSpaceTelegramMessage
    {
        $this->_application = $application;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->_channel;
    }

    /**
     * @param string $channel
     * @return $this
     */
    public function setChannel(string $channel): ContentSpaceTelegramMessage
    {
        $this->_channel = $channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): ContentSpaceTelegramMessage
    {
        $this->_content = $content;
        return $this;
    }
}

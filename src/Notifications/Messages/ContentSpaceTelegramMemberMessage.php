<?php

namespace ContentSpace\Notifications\Messages;

class ContentSpaceTelegramMemberMessage
{
    /**
     * @var string
     */
    private $_application;

    /**
     * @var int
     */
    private $_botId;

    /**
     * @var int
     */
    private $_memberId;

    /**
     * @var string
     */
    private $_content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $application, int $botId, int $memberId, string $content)
    {
        $this->_content = $content;
        $this->_application = $application;
        $this->_botId = $botId;
        $this->_memberId = $memberId;
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
    public function setApplication(string $application): self
    {
        $this->_application = $application;
        return $this;
    }

    /**
     * @return int
     */
    public function getBotId(): int
    {
        return $this->_botId;
    }

    /**
     * @param int $botId
     * @return $this
     */
    public function setBotId(int $botId): self
    {
        $this->_botId = $botId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMemberId(): int
    {
        return $this->_memberId;
    }

    /**
     * @param int $memberId
     * @return $this
     */
    public function setMemberId(int $memberId): self
    {
        $this->_memberId = $memberId;
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
    public function setContent(string $content): self
    {
        $this->_content = $content;
        return $this;
    }
}

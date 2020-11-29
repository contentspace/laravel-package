<?php

namespace ContentSpace\Notifications\Messages;

class ContentSpaceSmsMessage
{
    /**
     * @var string
     */
    private $_application;

    /**
     * @var string
     */
    private $_mobile;

    /**
     * @var string
     */
    private $_content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $application, string $mobile, string $content)
    {
        $this->_mobile = $mobile;
        $this->_content = $content;
        $this->_application = $application;
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
     * @return string
     */
    public function getMobile(): string
    {
        return $this->_mobile;
    }

    /**
     * @param string $mobile
     * @return $this
     */
    public function setMobile(string $mobile): self
    {
        $this->_mobile = $mobile;
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

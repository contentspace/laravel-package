<?php

namespace ContentSpace\Notifications\Messages;

class ContentSpaceTelegramImageMessage
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
    private $_caption;

    /**
     * @var array
     */
    private $_images;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $application, string $channel, string $caption, array $images)
    {
        $this->_caption = $caption;
        $this->_application = $application;
        $this->_channel = $channel;
        $this->_images = $images;
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
    public function getChannel(): string
    {
        return $this->_channel;
    }

    /**
     * @param string $channel
     * @return $this
     */
    public function setChannel(string $channel): self
    {
        $this->_channel = $channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->_caption;
    }

    /**
     * @param string $caption
     * @return $this
     */
    public function setCaption(string $caption): self
    {
        $this->_caption = $caption;
        return $this;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->_images;
    }

    /**
     * @param array $images
     * @return $this
     */
    public function setImages(array $images): self
    {
        $this->_images = $images;
        return $this;
    }

    /**
     * @param string $image
     * @return $this
     */
    public function addImage(string $image): self
    {
        $this->_images[] = $image;
        return $this;
    }
}

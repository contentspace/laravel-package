<?php

namespace ContentSpace\Notifications\Messages;

class ContentSpaceTelegramDocumentMessage
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
    private $_documents;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $application, string $channel, string $caption, array $documents)
    {
        $this->_caption = $caption;
        $this->_application = $application;
        $this->_channel = $channel;
        $this->_documents = $documents;
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
    public function getDocuments(): array
    {
        return $this->_documents;
    }

    /**
     * @param array $documents
     * @return $this
     */
    public function setDocuments(array $documents): self
    {
        $this->_documents = $documents;
        return $this;
    }

    /**
     * @param string $document
     * @return $this
     */
    public function addDocument(string $document): self
    {
        $this->_documents[] = $document;
        return $this;
    }
}

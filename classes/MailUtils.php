<?php

class MailUtils
{
    private string $to;
    private string $subject;
    private string $message;
    private string $from;
    private string $cc;
    private string $cci;
    private string $replyTo;
    private array $headers;

    public function __construct(string $to, string $subject, string $message, string $from='', string $cc='', string $cci='', string $replyTo='')
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->from = $from;
        $this->cc = $cc;
        $this->cci = $cci;
        $this->replyTo = $replyTo;
        $this->headers = [];
    }

    private function wrapMessage()
    {
        $this->message = wordwrap($this->message);
    }

    private function setHeaders()
    {
        $this->headers['Cc'] = $this->cc;
        $this->headers['Cci'] = $this->cci;
        $this->headers['Reply-To'] = $this->replyTo;
    }

    public function send()
    {
        $this->setHeaders();
        $this->wrapMessage();
        mail($this->to, $this->subject, $this->message, $this->headers, "-f ".$this->from);
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return void
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return void
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return void
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getCc(): string
    {
        return $this->cc;
    }

    /**
     * @param string $cc
     * @return void
     */
    public function setCc(string $cc): void
    {
        $this->cc = $cc;
    }

    /**
     * @return string
     */
    public function getCci(): string
    {
        return $this->cci;
    }

    /**
     * @param string $cci
     * @return void
     */
    public function setCci(string $cci): void
    {
        $this->cci = $cci;
    }

    /**
     * @return string
     */
}
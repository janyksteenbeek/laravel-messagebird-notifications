<?php

namespace NotificationChannels\Messagebird;

class MessagebirdRoute
{
    /**
     * The token to use for sending the notification.
     *
     * Overrides the config-defined token (if any).
     */
    public ?string $token;

    /**
     * This is the sender of the message.
     * This can be a telephone number (including country code) or an alphanumeric string.
     *
     * Overrides the config-defined recipient (if any).
     */
    public ?string $originator;

    /**
     * The recipients of the message.
     */
    public array $recipients;

    /**
     * Create a new Messagebird route instance.
     */
    public function __construct(array $recipients,
                                string $token = null,
                                string $originator = null)
    {
        $this->token = $token;
        $this->originator = $originator;
        $this->recipients = $recipients;
    }

    /**
     * Fluently create a new Messagebird route instance.
     */
    public static function make(array $recipients,
                                string $token = null,
                                string $originator = null): self
    {
        return new static($recipients, $token, $originator);
    }
}

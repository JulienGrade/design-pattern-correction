<?php

namespace App\Service;

class HeaderEmailDecorator implements EmailSenderInterface
{
    private EmailSenderInterface $wrapped;

    public function __construct(EmailSenderInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }

    public function send(string $recipient, string $subject, string $body): void
    {
        $body = "[Header] Important Information\n" . $body;
        $this->wrapped->send($recipient, $subject, $body);
    }
}
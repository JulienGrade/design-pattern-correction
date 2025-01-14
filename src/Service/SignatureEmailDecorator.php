<?php

namespace App\Service;

class SignatureEmailDecorator implements EmailSenderInterface
{
    private EmailSenderInterface $wrapped;

    public function __construct(EmailSenderInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }

    public function send(string $recipient, string $subject, string $body): void
    {
        $body .= "\n\n--\nBest regards,\nThe Team";
        $this->wrapped->send($recipient, $subject, $body);
    }
}
<?php

namespace App\Service;

class TimingEmailDecorator implements EmailSenderInterface
{
    private EmailSenderInterface $wrapped;

    public function __construct(EmailSenderInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }

    public function send(string $recipient, string $subject, string $body): void
    {
        $startTime = microtime(true);
        $this->wrapped->send($recipient, $subject, $body);
        $elapsed = microtime(true) - $startTime;
        echo "Email sending took {$elapsed} seconds\n";
    }
}
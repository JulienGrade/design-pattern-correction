<?php
namespace App\Service;

class EmailSenderService implements EmailSenderInterface
{
    public function send(string $recipient, string $subject, string $body): void
    {
        echo "Email sent to {$recipient} with subject '{$subject}' and body '{$body}'\n";
    }
}
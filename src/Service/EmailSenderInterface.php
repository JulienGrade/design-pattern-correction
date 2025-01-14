<?php

namespace App\Service;

interface EmailSenderInterface
{
    public function send(string $recipient, string $subject, string $body): void;
}
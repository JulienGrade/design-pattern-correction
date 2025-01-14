<?php

namespace App\Observer;

use App\Entity\Event;

interface EventObserverInterface
{
    public function notify(Event $event): void;
}


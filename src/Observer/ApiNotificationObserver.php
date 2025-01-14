<?php

namespace App\Observer;

use App\Entity\Event;

class ApiNotificationObserver implements EventObserverInterface
{
    public function notify(Event $event): void
    {
        echo "API notification sent for event '{$event->getName()}' at {$event->getDate()->format('Y-m-d H:i:s')}.\n";
    }
}
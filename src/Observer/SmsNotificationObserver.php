<?php

namespace App\Observer;

use App\Entity\Event;

class SmsNotificationObserver implements EventObserverInterface
{
    public function notify(Event $event): void
    {
        echo "SMS sent for event '{$event->getName()}' at {$event->getDate()->format('Y-m-d H:i:s')}.\n";
    }
}

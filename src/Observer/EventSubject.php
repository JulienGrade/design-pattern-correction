<?php

namespace App\Observer;

use App\Entity\Event;

class EventSubject
{
    private array $observers = [];

    public function attach(EventObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(EventObserverInterface $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            static fn($o) => $o !== $observer
        );
    }

    public function notifyObservers(Event $event): void
    {
        foreach ($this->observers as $observer) {
            $observer->notify($event);
        }
    }
}
<?php

namespace App\Service;

use App\Entity\Attendee;
use App\Factory\BadgeFactoryInterface;

class BadgeService
{
    private BadgeFactoryInterface $factory;

    public function setFactory(BadgeFactoryInterface $factory): void
    {
        $this->factory = $factory;
    }

    public function generateBadge(Attendee $attendee): string
    {
        return $this->factory->createBadge($attendee);
    }
}
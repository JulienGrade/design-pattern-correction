<?php

namespace App\Factory;

use App\Entity\Attendee;

interface BadgeFactoryInterface
{
    public function createBadge(Attendee $attendee): string;
}
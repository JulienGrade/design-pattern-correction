<?php

namespace App\Strategy;

class SpeakerFeeStrategy implements FeeStrategyInterface
{
    public function calculateFee(float $baseFee): float
    {
        return 0.0; // Gratuit
    }
}
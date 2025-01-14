<?php

namespace App\Strategy;

class ProfessionalFeeStrategy implements FeeStrategyInterface
{
    public function calculateFee(float $baseFee): float
    {
        return $baseFee; // Pas de réduction
    }
}


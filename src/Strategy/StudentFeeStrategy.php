<?php

namespace App\Strategy;

class StudentFeeStrategy implements FeeStrategyInterface
{
    public function calculateFee(float $baseFee): float
    {
        return $baseFee * 0.5; // Réduction de 50 %
    }
}
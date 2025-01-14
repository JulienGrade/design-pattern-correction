<?php

namespace App\Strategy;

interface FeeStrategyInterface
{
    public function calculateFee(float $baseFee): float;
}
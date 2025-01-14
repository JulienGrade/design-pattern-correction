<?php

namespace App\Service;

use App\Strategy\FeeStrategyInterface;
use LogicException;

class FeeCalculatorService
{
    private FeeStrategyInterface $strategy;

    public function setStrategy(FeeStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function calculate(float $baseFee): float
    {
        if (!isset($this->strategy)) {
            throw new LogicException('Strategy not set.');
        }

        return $this->strategy->calculateFee($baseFee);
    }
}


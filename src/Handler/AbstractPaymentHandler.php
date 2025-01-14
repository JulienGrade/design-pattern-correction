<?php

namespace App\Handler;

use App\Entity\Payment;

abstract class AbstractPaymentHandler implements PaymentHandlerInterface
{
    private ?PaymentHandlerInterface $nextHandler = null;

    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(Payment $payment): bool
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($payment);
        }

        return false;
    }
}
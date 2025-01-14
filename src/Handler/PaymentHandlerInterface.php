<?php

namespace App\Handler;

use App\Entity\Payment;

interface PaymentHandlerInterface
{
    public function setNext(PaymentHandlerInterface $handler): PaymentHandlerInterface;

    public function handle(Payment $payment): bool;
}
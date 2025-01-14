<?php

namespace App\Handler;

use App\Entity\Payment;

class BankTransferPaymentHandler extends AbstractPaymentHandler
{
    public function handle(Payment $payment): bool
    {
        if ($payment->getMethod() === 'bank_transfer') {
            // Traitement du virement bancaire
            echo "Payment processed via Bank Transfer\n";
            return true;
        }

        return parent::handle($payment);
    }
}
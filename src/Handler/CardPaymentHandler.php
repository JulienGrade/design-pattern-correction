<?php

namespace App\Handler;

use App\Entity\Payment;

class CardPaymentHandler extends AbstractPaymentHandler
{
    public function handle(Payment $payment): bool
    {
        if ($payment->getMethod() === 'card') {
            // Traitement du paiement par carte
            echo "Payment processed via Card\n";
            return true;
        }

        return parent::handle($payment);
    }
}

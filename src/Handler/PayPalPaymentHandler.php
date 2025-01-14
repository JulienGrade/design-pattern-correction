<?php

namespace App\Handler;

use App\Entity\Payment;

class PayPalPaymentHandler extends AbstractPaymentHandler
{
    public function handle(Payment $payment): bool
    {
        if ($payment->getMethod() === 'paypal') {
            // Traitement du paiement via PayPal
            echo "Payment processed via PayPal\n";
            return true;
        }

        return parent::handle($payment);
    }
}
<?php

namespace App\Controller;

use App\Entity\Payment;
use App\Handler\BankTransferPaymentHandler;
use App\Handler\CardPaymentHandler;
use App\Handler\PayPalPaymentHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class PaymentController extends AbstractController{

    #[Route('/payment/{method}', name: 'process_payment', methods: ['GET'])]
    public function processPayment(string $method): JsonResponse
    {
        $payment = new Payment($method);

        $cardHandler = new CardPaymentHandler();
        $paypalHandler = new PayPalPaymentHandler();
        $bankTransferHandler = new BankTransferPaymentHandler();

        // Construction de la chaîne
        $cardHandler->setNext($paypalHandler)->setNext($bankTransferHandler);

        if (!$cardHandler->handle($payment)) {
            return new JsonResponse(['error' => 'Payment method not supported'], 400);
        }

        return new JsonResponse(['message' => 'Payment processed successfully']);
    }
}

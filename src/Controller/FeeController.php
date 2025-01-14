<?php

namespace App\Controller;

use App\Service\FeeCalculatorService;
use App\Strategy\ProfessionalFeeStrategy;
use App\Strategy\SpeakerFeeStrategy;
use App\Strategy\StudentFeeStrategy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class FeeController extends AbstractController{
    #[Route('/fee/calculate', name: 'fee_calculate', methods: ['GET'])]
    public function calculate(Request $request, FeeCalculatorService $feeCalculator): JsonResponse
    {
        $role = $request->query->get('role', 'professional');
        $baseFee = (float) $request->query->get('baseFee', 100.0);

        // Définir la stratégie en fonction du rôle
        switch ($role) {
            case 'student':
                $feeCalculator->setStrategy(new StudentFeeStrategy());
                break;
            case 'speaker':
                $feeCalculator->setStrategy(new SpeakerFeeStrategy());
                break;
            case 'professional':
            default:
                $feeCalculator->setStrategy(new ProfessionalFeeStrategy());
                break;
        }

        // Calculer les frais
        $calculatedFee = $feeCalculator->calculate($baseFee);

        // afin de tester on peut utiliser la commande :
        // curl -k "https://127.0.0.1:8000/fee/calculate?role=student&baseFee=200"
        return new JsonResponse([
            'role' => $role,
            'baseFee' => $baseFee,
            'calculatedFee' => $calculatedFee,
        ]);
    }
}

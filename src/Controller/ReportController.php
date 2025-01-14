<?php

namespace App\Controller;

use App\Command\DailyReportCommand;
use App\Command\MonthlyReportCommand;
use App\Command\WeeklyReportCommand;
use App\Service\ReportInvoker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReportController extends AbstractController{

    #[Route('/report/{type}', name: 'generate_report', methods: ['GET'])]
    public function generateReport(string $type): JsonResponse
    {
        $invoker = new ReportInvoker();
        $invoker->addCommand('daily', new DailyReportCommand());
        $invoker->addCommand('weekly', new WeeklyReportCommand());
        $invoker->addCommand('monthly', new MonthlyReportCommand());

        try {
            $result = $invoker->execute($type);
        } catch (\InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }

        return new JsonResponse(['message' => $result]);
    }

}

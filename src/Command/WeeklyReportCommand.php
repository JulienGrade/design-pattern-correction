<?php
namespace App\Command;

class WeeklyReportCommand implements ReportCommandInterface
{
    public function execute(): string
    {
        return 'Weekly report generated.';
    }
}
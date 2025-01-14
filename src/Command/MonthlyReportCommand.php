<?php
namespace App\Command;

class MonthlyReportCommand implements ReportCommandInterface
{
    public function execute(): string
    {
        return 'Monthly report generated.';
    }
}

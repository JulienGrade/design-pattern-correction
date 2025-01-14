<?php

namespace App\Command;

class DailyReportCommand implements ReportCommandInterface
{
    public function execute(): string
    {
        return 'Daily report generated.';
    }
}
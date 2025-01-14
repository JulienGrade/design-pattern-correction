<?php

namespace App\Service;

use App\Command\ReportCommandInterface;

class ReportInvoker
{
    private array $commands = [];

    public function addCommand(string $name, ReportCommandInterface $command): void
    {
        $this->commands[$name] = $command;
    }

    public function execute(string $name): string
    {
        if (!isset($this->commands[$name])) {
            throw new \InvalidArgumentException("No command found for name: {$name}");
        }

        return $this->commands[$name]->execute();
    }
}
<?php

namespace Goldfinch\Dashboard\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'make:dashboard-card')]
class DashboardCardCommand extends GeneratorCommand
{
    protected static $defaultName = 'make:dashboard-card';

    protected $description = 'Create new dashboard card';

    protected $path = 'app/src/Dashboard/Cards';

    protected $type = 'dashboardcard';

    protected $stub = './stubs/dashboardcard.stub';

    protected $prefix = 'Card';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}

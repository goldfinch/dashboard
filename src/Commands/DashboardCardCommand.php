<?php

namespace Goldfinch\Dashboard\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'make:dashboard-card')]
class DashboardCardCommand extends GeneratorCommand
{
    protected static $defaultName = 'make:dashboard-card';

    protected $description = 'Create new dashboard card';

    protected $path = 'app/src/Dashboard/Cards';

    protected $type = 'dashboardcard';

    protected $stub = './stubs/dashboardcard.stub';

    protected $suffix = 'Card';
}

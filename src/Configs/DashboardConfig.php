<?php

namespace Goldfinch\Dashboard\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class DashboardConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'DashboardConfig';

    private static $db = [
        'Disabled' => 'Boolean',
    ];
}

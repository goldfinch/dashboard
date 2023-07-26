<?php

namespace Goldfinch\Dashboard\Helpers;

use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;
use SilverStripe\Core\Environment;

class BuildHelper
{
    public static function isProduction()
    {
        if (
          Director::isDev() &&
          Environment::getEnv('GOLDFINCH_DASHBOARD_DEV')
        )
        {
            $port = 5173;
            $host = 'https://' . Director::host() . ':' . $port;

            Requirements::insertHeadTags('
            <script type="module" src="' . $host . '/@vite/client"></script>
            <link rel="stylesheet" href="' . $host . '/src/dashboard.scss">
            <script type="module" src="' . $host . '/src/dashboard.js"></script>
            ');

            return false;
        }
        else
        {
            return true;
        }
    }
}

<?php

namespace Goldfinch\Dashboard\Admin;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\View\Requirements;

class DashboardAdmin extends LeftAndMain implements PermissionProvider
{
    private static $url_segment = 'dashboard';

    private static $menu_title = 'Dashboard';

    private static $menu_priority = 0;

    private static $menu_icon_class = 'bi-rocket-takeoff';

    public function init()
    {
        parent::init();

        $production = true;

        if ($production)
        {
            Requirements::css('/build-dashboard/dashboard/assets/app.css');
            Requirements::javascript('/build-dashboard/dashboard/assets/app2.js');
        }
        else
        {
            $host = 'https://silverstripe-starter.lh:5173';
            // $host = 'https://[::1]:5173';
            // $host = 'https://127.0.0.1:5173';

            Requirements::insertHeadTags('
            <script type="module" src="' . $host . '/@vite/client"></script>
            <link rel="stylesheet" href="' . $host . '/src/app.scss">
            <script type="module" src="' . $host . '/src/app.js"></script>
            ');
        }
    }
}

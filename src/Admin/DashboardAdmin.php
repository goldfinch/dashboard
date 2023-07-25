<?php

namespace Goldfinch\Dashboard\Admin;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\View\Requirements;
use Goldfinch\Dashboard\Helpers\BuildHelper;
use SilverStripe\Security\PermissionProvider;

class DashboardAdmin extends LeftAndMain implements PermissionProvider
{
    private static $url_segment = 'dashboard';

    private static $menu_title = 'Dashboard';

    private static $menu_priority = 0;

    private static $menu_icon_class = 'bi-rocket-takeoff';

    public function init()
    {
        parent::init();

        if (BuildHelper::isProduction())
        {
            Requirements::css('goldfinch/dashboard:client/dist/dashboard/assets/dashboard.css');
            Requirements::javascript('goldfinch/dashboard:client/dist/dashboard/assets/dashboard2.js');
        }
    }
}

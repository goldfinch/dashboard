<?php

namespace Goldfinch\Dashboard\Admin;

use SilverStripe\Admin\LeftAndMain;
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
    }
}

<?php

namespace Goldfinch\Dashboard\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;
use Goldfinch\Dashboard\Helpers\BuildHelper;

class DashboardExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain'))
        {
            if (BuildHelper::isProduction())
            {
                Requirements::css('goldfinch/dashboard:client/dist/enchantment/assets/dashboard.css');
                Requirements::javascript('goldfinch/dashboard:client/dist/enchantment/assets/dashboard.js');
            }
        }
    }
}

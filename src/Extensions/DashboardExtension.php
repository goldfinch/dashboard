<?php

namespace Goldfinch\Dashboard\Extensions;

use Composer\InstalledVersions;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;
use Goldfinch\Dashboard\Helpers\BuildHelper;

class DashboardExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain')) {
            if (BuildHelper::isProduction()) {
                Requirements::css(
                    'goldfinch/dashboard:client/dist/dashboard-style.css',
                );
                Requirements::javascript(
                    'goldfinch/dashboard:client/dist/dashboard.js',
                );
            }

            // extra assets
            Requirements::css(
                'goldfinch/extra-assets:client/dist/font-opensans.css',
            );

            if (!InstalledVersions::isInstalled('goldfinch/enchantment')) {
                Requirements::css(
                    'goldfinch/extra-assets:client/dist/bootstrap-icons.css',
                );
            }
        }
    }
}

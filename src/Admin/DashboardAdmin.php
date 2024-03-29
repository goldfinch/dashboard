<?php

namespace Goldfinch\Dashboard\Admin;

use Composer\InstalledVersions;
use SilverStripe\Admin\LeftAndMain;
use SilverStripe\View\Requirements;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Dashboard\Helpers\BuildHelper;
use SilverStripe\Security\PermissionProvider;
use Goldfinch\Dashboard\Configs\DashboardConfig;
use SilverStripe\Admin\ModelAdmin;

class DashboardAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $managed_models = [
        DashboardConfig::class => [
            'title' => 'Settings',
        ],
    ];

    private static $url_segment = 'dashboard';

    private static $menu_title = 'Dashboard';

    private static $menu_priority = 100;

    private static $menu_icon_class = 'font-icon-dashboard';

    public function init()
    {
        parent::init();

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

<?php

namespace Goldfinch\Dashboard\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use SilverStripe\Security\Permission;

class DashboardExtension extends Extension
{
    public function onAfterInit()
    {
        if (Permission::check('CMS_ACCESS_CMSMain')) {

          $production = false;

          if ($production)
          {
              Requirements::css('/build-dashboard/assets/app.css');
              Requirements::javascript('/build-dashboard/assets/app.js');
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
}

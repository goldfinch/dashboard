<?php

namespace Goldfinch\Dashboard;

use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Goldfinch\Dashboard\Configs\DashboardConfig;

class DashboardPanel extends DataObject
{
    protected $panel_header = 'Panel';

    protected $panel_cols = 12;

    protected $panel_position = 1;

    protected $panel_extra_class = 'dashcard';

    protected $panel_actions = [];

    protected $panel_dev = false;

    private static $table_name = 'DashboardPanel';

    private static $singular_name = 'panel';

    private static $plural_name = 'panels';

    private static $db = [
        'Title' => 'Varchar',
        'SortOrder' => 'Int',
    ];

    private static $has_one = [
        'Config' => DashboardConfig::class,
    ];

    private static $indexes = [
        'SortOrder' => true,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'ClassName.ShortName' => 'Panel',
    ];

    private static $default_sort = 'SortOrder ASC, ID DESC';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['SortOrder', 'ConfigID']);

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function process(): array
    {
        //
    }

    public function run()
    {
        $template = $this->customise(ArrayData::create($this->process()))->renderWith(get_class($this));

        return $this->customise(ArrayData::create(['Panel' => $this, 'Template' => $template])->renderWith(__CLASS__));
    }

    public function PanelHeader()
    {
        return $this->panel_header;
    }

    public function PanelCols()
    {
        return $this->panel_cols;
    }

    public function PanelExtraClass()
    {
        return $this->panel_extra_class;
    }

    public function PanelActions()
    {
        $actions = $this->panel_actions;

        $html = DBHTMLText::create();

        if (count($actions)) {

            $content = '';

            foreach ($actions as $action) {
                $content .= '<a class="card-action" title="'.$action['title'].'" href="'.$action['link'].'" target="_self"
                ><i class="'.$action['icon'].'"></i
                ></a>';
            }

            $html->setValue($content);
        }

        return $html;
    }

    public function newPanel()
    {
        $this->Title = $this->panel_header;
        $this->SortOrder = $this->panel_position;
        $this->write();

        return $this;
    }

    public function isDev()
    {
        return $this->panel_dev;
    }
}

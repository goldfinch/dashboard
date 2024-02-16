<?php

namespace Goldfinch\Dashboard;

use SilverStripe\View\ArrayData;
use SilverStripe\View\ViewableData;
use SilverStripe\Core\Config\Configurable;

class DashboardPanel extends ViewableData
{
    use Configurable;

    protected $panel_header = 'Panel';

    protected $panel_cols = 12;

    protected $panel_position = 1;

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
}

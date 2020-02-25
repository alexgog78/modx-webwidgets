<?php

if (!$this->loadClass('abstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class webwidgetsWidgetUpdateProcessor extends abstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'webwidgetsWidget';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'webwidgetsWidgetUpdateProcessor';

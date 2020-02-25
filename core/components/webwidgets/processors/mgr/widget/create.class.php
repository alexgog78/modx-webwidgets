<?php

if (!$this->loadClass('abstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class webwidgetsWidgetCreateProcessor extends abstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'webwidgetsWidget';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'webwidgetsWidgetCreateProcessor';

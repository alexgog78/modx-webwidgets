<?php

if (!$this->loadClass('abstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class webwidgetsWidgetRemoveProcessor extends abstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'webwidgetsWidget';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'webwidgetsWidgetRemoveProcessor';

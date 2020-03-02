<?php

if (!$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class WebWidgetsChunkUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'WebWidgetsChunk';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'WebWidgetsChunkUpdateProcessor';

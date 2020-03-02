<?php

if (!$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class WebWidgetsChunkCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'WebWidgetsChunk';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'WebWidgetsChunkCreateProcessor';

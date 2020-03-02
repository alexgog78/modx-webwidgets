<?php

if (!$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class WebWidgetsChunkRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'WebWidgetsChunk';

    /** @var string */
    public $objectType = 'webwidgets';
}

return 'WebWidgetsChunkRemoveProcessor';

<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class webwidgetsChunkRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $classKey = 'webwidgetsChunk';
}

return 'webwidgetsChunkRemoveProcessor';

<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class webwidgetsChunkUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $classKey = 'webwidgetsChunk';
}

return 'webwidgetsChunkUpdateProcessor';

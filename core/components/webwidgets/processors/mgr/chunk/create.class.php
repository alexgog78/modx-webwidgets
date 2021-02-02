<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/create.class.php';

class webwidgetsChunkCreateProcessor extends abstractModuleCreateProcessor
{
    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $classKey = 'webwidgetsChunk';
}

return 'webwidgetsChunkCreateProcessor';

<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/getlist.class.php';

class webwidgetsChunkGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $classKey = 'webwidgetsChunk';
}

return 'webwidgetsChunkGetListProcessor';

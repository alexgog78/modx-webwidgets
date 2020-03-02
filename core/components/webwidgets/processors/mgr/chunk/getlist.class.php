<?php

if (!$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class WebWidgetsChunkGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'WebWidgetsChunk';

    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $defaultSortField = 'id';

    /**
     * @param xPDOQuery $c
     * @param string $query
     * @return xPDOQuery
     */
    public function searchQuery(xPDOQuery $c, $query)
    {
        $c->where([
            'name:LIKE' => '%' . $query . '%',
        ]);
        return $c;
    }
}

return 'WebWidgetsChunkGetListProcessor';

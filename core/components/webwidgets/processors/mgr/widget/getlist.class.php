<?php

if (!$this->loadClass('abstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class webwidgetsWidgetGetListProcessor extends abstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'webwidgetsWidget';

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

return 'webwidgetsWidgetGetListProcessor';

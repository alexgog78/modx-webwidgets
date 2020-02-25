<?php

if (!class_exists('abstractModule')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class WebWidgets extends abstractModule
{
    /** @var string */
    protected $tablePrefix = 'webwidgets_';

    /** @var array */
    protected $handlers = [
        'default' => [],
        'mgr' => [
            'Base',
        ],
        'web' => [],
    ];
}

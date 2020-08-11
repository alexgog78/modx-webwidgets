<?php

if (!class_exists('AbstractModule')) {
    /** @noinspection PhpIncludeInspection */
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class WebWidgets extends AbstractModule
{
    /** @var string */
    protected $tablePrefix = 'webwidgets_';

    /** @var array */
    /*protected $handlers = [
        'default' => [],
        'mgr' => [
            'Base',
        ],
        'web' => [
            'Base',
        ],
    ];*/
}

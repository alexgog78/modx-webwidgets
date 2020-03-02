<?php

if (!$this->modx->loadClass('AbstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true)) {
    return false;
}

abstract class WebWidgetsManagerController extends AbstractManagerController
{
    /** @var string\bool */
    protected $moduleClass = 'WebWidgets';
}

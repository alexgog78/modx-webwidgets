<?php

$this->modx->loadClass('AbstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true);

abstract class WebWidgetsManagerController extends AbstractManagerController
{
    /** @var string\bool */
    protected $moduleClass = 'WebWidgets';

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
    }
}

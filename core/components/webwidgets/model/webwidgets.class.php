<?php

$this->loadClass('abstractModule', MODX_CORE_PATH . 'components/abstractmodule/model/', true, true);

class webWidgets extends abstractModule
{
    const PKG_VERSION = '1.1.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'webwidgets';
    const TABLE_PREFIX = 'webwidgets_';
    const DEVELOPER_MODE = true;
}

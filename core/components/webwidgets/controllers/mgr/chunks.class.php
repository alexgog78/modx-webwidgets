<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class WebWidgetsMgrChunksManagerController extends WebWidgetsManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.chunks');
    }

    public function loadCustomCssJs()
    {
        $this->module->mgrBase->loadAssets($this);
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/chunk/grid.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/chunks/list.js');
    }
}

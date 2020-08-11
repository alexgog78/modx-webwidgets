<?php

require_once dirname(__FILE__) . '/manager.class.php';

class WebWidgetsMgrChunksManagerController extends WebWidgetsManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.chunks');
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/chunk/grid.js');
        $this->addLastJavascript($this->config['jsUrl'] . 'mgr/sections/chunks/list.js');
    }
}

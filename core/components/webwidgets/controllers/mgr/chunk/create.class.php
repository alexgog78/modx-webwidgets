<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(dirname(__FILE__)) . '/manager.class.php';
}

class WebWidgetsMgrChunkCreateManagerController extends WebWidgetsManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('title.creating', [
            'record' => $this->getLexicon('section.chunk')
        ]);
    }

    public function loadCustomCssJs()
    {
        $this->module->mgrBase->loadAssets($this);
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/chunk/formpanel.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/chunks/create.js');
        $this->loadCodeEditor(['code_header', 'code_footer']);
    }
}

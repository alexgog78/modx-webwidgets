<?php

if (!$this->modx->loadClass('abstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true)) {
    return false;
}

class WebWidgetsMgrWidgetsManagerController extends abstractManagerController
{
    /**
     * @var array
     */
    protected $languageTopics = ['webwidgets:default'];

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getLexicon('section.widgets');
    }

    public function loadCustomCssJs()
    {
        $this->module->mgrBase->loadAssets($this);
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/widget/grid.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/widgets/list.js');
    }

    protected function getService()
    {
        $this->module = $this->modx->getService('webwidgets', 'WebWidgets', MODX_CORE_PATH . 'components/webwidgets/model/webwidgets/', [
            'ctx' => $this->modx->context->key,
        ]);
    }
}

<?php

require_once dirname(dirname(__FILE__)) . '/manager.class.php';

class WebWidgetsMgrChunkUpdateManagerController extends WebWidgetsManagerController
{
    /** @var string */
    protected $recordClassKey = 'WebWidgetsChunk';

    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('title.editing', [
            'record' => $this->getLexicon('section.chunk')
        ]);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/chunk/formpanel.js');
        $this->addLastJavascript($this->config['jsUrl'] . 'mgr/sections/chunks/update.js');

        //$this->loadCodeEditor(['code_header', 'code_footer']);

        //TODO remove
        $configJs = $this->modx->toJSON([
            'xtype' => 'webwidgets-page-chunk-update',
            'recordId' => $this->record->id,
            'record' => $this->record->toArray(),
        ]);
        $this->addHtml(
            '<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>'
        );

        /*parent::loadCustomCssJs();
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/template/formpanel.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/template/users/grid.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/template/update.js');
        $this->loadCodeEditor();
        */
    }
}

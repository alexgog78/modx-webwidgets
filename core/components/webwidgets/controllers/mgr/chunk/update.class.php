<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/update.class.php';

class webWidgetsMgrChunkUpdateManagerController extends abstractModuleMgrUpdateController
{
    /** @var string */
    protected $objectGetProcessorPath = 'mgr/chunk/get';

    /** @var string */
    protected $pageTitle = 'webwidgets_chunk_editing';

    /** @var array */
    protected $languageTopics = [
        'webwidgets:chunk',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/chunk/formpanel.chunk.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/chunk/property/grid.chunk.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/chunk/property/window.chunk.property.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/chunk/update.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'webwidgets-page-chunk-update',
            'record' => $this->object,
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}

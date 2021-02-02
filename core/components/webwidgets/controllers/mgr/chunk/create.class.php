<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/create.class.php';

class webWidgetsMgrChunkCreateManagerController extends abstractModuleMgrCreateController
{
    /** @var string */
    protected $pageTitle = 'webwidgets_chunk_creating';

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

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/chunk/create.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'webwidgets-page-chunk-create',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}

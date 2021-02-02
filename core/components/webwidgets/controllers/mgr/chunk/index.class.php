<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/default.class.php';

class webWidgetsMgrChunkManagerController extends abstractModuleMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'webwidgets_chunk_list';

    /** @var array */
    protected $languageTopics = [
        'webwidgets:chunk',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/chunk/panel.chunks.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/chunk/grid.chunk.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/chunk/list.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'webwidgets-page-chunk-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}

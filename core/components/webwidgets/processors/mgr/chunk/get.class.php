<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/get.class.php';

class webwidgetsChunkGetProcessor extends abstractModuleGetProcessor
{
    /** @var string */
    public $objectType = 'webwidgets';

    /** @var string */
    public $classKey = 'webwidgetsChunk';

    public function beforeOutput()
    {
        $this->prepareCodeText();
        parent::beforeOutput();
    }

    private function prepareCodeText()
    {
        if (!$this->object->get('code_header')) {
            $this->object->set('code_header', '');
        }
        if (!$this->object->get('code_footer')) {
            $this->object->set('code_footer', '');
        }
    }
}

return 'webwidgetsChunkGetProcessor';

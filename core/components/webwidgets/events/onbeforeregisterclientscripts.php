<?php

//TODO check if needed
class webWidgetsEventOnBeforeRegisterClientScripts extends abstractModuleEvent
{
    /** @var bool */
    public static $useMgrContext = false;

    public function run()
    {
        // TODO: Implement run() method.
        $chunkFactory = $this->modx->newObject('webwidgetsChunk');
        $chunkFactory->renderCollection();
    }
}

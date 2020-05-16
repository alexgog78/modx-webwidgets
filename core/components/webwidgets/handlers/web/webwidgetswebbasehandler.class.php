<?php

class WebWidgetsWebBaseHandler extends AbstractWebHandler
{
    /** @var WebWidgetsChunk */
    private $chunkFactory;

    /** @var modParser */
    private $parser;

    /** @var int */
    private $maxIterations = 10;

    /**
     * WebWidgetsWebBaseHandler constructor.
     * @param $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        $this->chunkFactory = $this->modx->newObject('WebWidgetsChunk');
        $this->parser = $this->modx->getService('modParser');
        $this->maxIterations = (int)$this->modx->getOption('parser_max_iterations', null, 10);
    }

    public function loadAssets()
    {
        $chunkCollection = $this->chunkFactory->loadActiveCollection();
        foreach ($chunkCollection as $chunk) {
            if (!$this->validate($chunk)) {
                continue;
            }
            if (!empty($chunk->code_header)) {
                $code = $this->parseContent($chunk->code_header);
                $this->modx->regClientStartupHTMLBlock($code);
            }
            if (!empty($chunk->code_footer)) {
                $code = $this->parseContent($chunk->code_footer);
                $this->modx->regClientHTMLBlock($code);
            }
        }
    }

    private function parseContent($content)
    {
        $this->parser->processElementTags('', $content, false, false, '[[', ']]', [], $this->maxIterations);
        $this->parser->processElementTags('', $content, true, true, '[[', ']]', [], $this->maxIterations);
        return $content;
    }

    /**
     * TODO
     * @param WebWidgetsChunk $chunk
     * @return bool
     */
    private function validate(WebWidgetsChunk $chunk)
    {
        return true;
    }
}

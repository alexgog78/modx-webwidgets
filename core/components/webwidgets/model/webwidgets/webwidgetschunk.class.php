<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class webwidgetsChunk extends abstractSimpleObject
{
    const DEFAULT_PARSER = 'modParser';

    /** @var webWidgets */
    private $service;

    /** @var array */
    private $parsers = [];

    /** @var int */
    private $maxIterations;

    /**
     * webwidgetsChunk constructor.
     *
     * @param xPDO $xpdo
     */
    public function __construct(xPDO &$xpdo)
    {
        parent::__construct($xpdo);
        $this->service = $this->xpdo->getService('webWidgets', 'webWidgets', dirname(__DIR__) . '/');
        $this->parsers[self::DEFAULT_PARSER] = $this->xpdo->getService(self::DEFAULT_PARSER);
        $this->maxIterations = (int)$this->xpdo->getOption('parser_max_iterations', null, 10);
    }

    //TODO events
    public function renderCollection()
    {
        $collection = $this->xpdo->getCollection($this->_class, [
            'is_active' => 1
        ]);
        foreach ($collection as $chunk) {
            $chunk->render();
        }
    }

    private function render()
    {
        $parserClass = $this->get('parser_class');
        $codeHeader = $this->get('code_header');
        $codeFooter = $this->get('code_footer');
        if (!empty($codeHeader)) {
            $code = $this->parseContent($codeHeader, $parserClass);
            $this->xpdo->regClientStartupHTMLBlock($code);
        }
        if (!empty($codeFooter)) {
            $code = $this->parseContent($codeFooter, $parserClass);
            $this->xpdo->regClientHTMLBlock($code);
        }
    }

    /**
     * @param string $content
     * @param string $parserClass
     * @return string
     */
    private function parseContent($content = '', $parserClass = self::DEFAULT_PARSER)
    {
        if (!$this->parsers[$parserClass]) {
            $this->parsers[$parserClass] = $this->xpdo->getService($parserClass);
        }
        $properties = $this->get('properties');
        foreach ($properties as $property) {
            $this->xpdo->setPlaceholder($property['key'], $property['value']);
        }
        $this->parsers[$parserClass]->processElementTags('', $content, true, true, '[[', ']]', [], $this->maxIterations);
        return $content;
    }
}

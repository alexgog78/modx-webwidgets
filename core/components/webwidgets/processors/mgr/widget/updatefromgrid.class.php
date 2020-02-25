<?php

if (!class_exists('webwidgetsWidgetUpdateProcessor')) {
    require_once(dirname(__FILE__) . '/update.class.php');
}

class webwidgetsWidgetUpdateFromGridProcessor extends webwidgetsWidgetUpdateProcessor
{
    /**
     * @return bool|string|null
     */
    public function initialize()
    {
        $data = $this->getProperty('data');
        if (empty($data)) {
            return $this->modx->lexicon('invalid_data');
        }

        $data = $this->modx->fromJSON($data);
        if (empty($data)) {
            return $this->modx->lexicon('invalid_data');
        }

        $this->setProperties($data);
        $this->unsetProperty('data');

        return parent::initialize();
    }
}

return 'webwidgetsWidgetUpdateFromGridProcessor';

<?php

/**
 * @var modX $modx
 * @var array $scriptProperties
 */

/** @var webWidgets $webWidgets */
$webWidgets = $modx->getService('webwidgets', 'webWidgets', MODX_CORE_PATH . 'components/webwidgets/model/');
if (!($webWidgets instanceof webWidgets)) {
    exit('Could not load webWidgets');
}
$modxEvent = $modx->event->name;
$webWidgets->handleEvent($modxEvent, $scriptProperties);
return;

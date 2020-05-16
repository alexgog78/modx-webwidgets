<?php

/** @noinspection PhpUndefinedVariableInspection */
/** @var modX $modx */

/** @var WebWidgets $webWidgets */
$webWidgets = $modx->getService('webwidgets', 'WebWidgets', $modx->getOption('core_path') . 'components/webwidgets/model/webwidgets/', [
    'ctx' => $modx->context->key,
]);
if (!($webWidgets instanceof WebWidgets)) {
    exit('Could not load WebWidgets');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'OnBeforeRegisterClientScripts':
        $webWidgets->webBase->loadAssets();
        break;
}
return;

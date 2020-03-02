<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;

    $models = [
        'WebWidgetsChunk',
    ];

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $ms2Extend = $modx->getService('webwidgets', 'WebWidgets', $modx->getOption('core_path') . 'components/webwidgets/model/webwidgets/', []);
            $manager = $modx->getManager();
            foreach ($models as $model) {
                $manager->createObjectContainer($model);
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;

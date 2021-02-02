<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $category = $modx->getObject('modCategory', ['category' => 'webWidgets']);
            $plugins = $modx->getCollection('modPlugin', [
                'name:IN' => [
                    'webWidgets',
                ],
            ]);
            foreach ($plugins as $item) {
                $item->set('category', $category->get('id'));
                $item->save();
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;

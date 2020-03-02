<?php

$prefix = 'webwidgets.';

$_lang['webwidgets'] = 'WebWidgets';
$_lang[$prefix . 'management'] = 'Дополнительные виджеты и meta-теги для сайта';

$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once($file);
    }
}

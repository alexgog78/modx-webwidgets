<?php

define('PKG_NAME', 'WebWidgets');
define('PKG_NAME_LOWER', 'webwidgets');

if (!class_exists('amConnector')) {
    require_once '../abstractmodule/connector.class.php';
}

(new class(PKG_NAME_LOWER, PKG_NAME) extends amConnector
{
})->process();

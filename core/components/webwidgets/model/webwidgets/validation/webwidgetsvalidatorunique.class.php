<?php

if (!$this->loadClass('AbstractValidatorUnique', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/validation/', true, true)) {
    return false;
}

class WebWidgetsValidatorUnique extends AbstractValidatorUnique
{

}

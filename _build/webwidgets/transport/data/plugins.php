<?php

return [
    [
        'name' => 'webWidgets',
        'static_file' => 'webwidgets.php',
        'events' => [
            'OnLoadWebDocument',
            'OnBeforeRegisterClientScripts',
        ],
    ],
];

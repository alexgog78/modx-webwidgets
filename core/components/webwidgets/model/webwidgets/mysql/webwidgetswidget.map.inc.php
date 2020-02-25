<?php

$xpdo_meta_map['webwidgetsWidget'] = [
    'package' => 'webwidgets',
    'version' => '1.0',
    'table' => 'webwidgets',
    'extends' => 'abstractSimpleObject',
    'tableMeta' => [
        'engine' => 'MyISAM',
    ],
    'fields' => [
        'name' => NULL,
        'description' => NULL,
        'is_active' => 0,
        'code_header' => NULL,
        'code_footer' => NULL,
    ],
    'fieldMeta' => [
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'description' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'is_active' => [
            'dbtype' => 'tinyint',
            'precision' => '1',
            'attributes' => 'unsigned',
            'phptype' => 'boolean',
            'null' => false,
            'default' => 0,
        ],
        'code_header' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'code_footer' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
    ],
    'indexes' => [
        'is_active' => [
            'alias' => 'is_active',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'is_active' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'validation' => [
        'rules' => [
            'name' => [
                'preventBlank' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOMinLengthValidationRule',
                    'value' => '1',
                    'message' => 'field_required',
                ],
                'unique' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'validation.WebWidgetsValidatorUnique',
                    'excludeFields' => '',
                    'message' => 'webwidgets.err_ae',
                ],
            ],
        ],
    ],
];

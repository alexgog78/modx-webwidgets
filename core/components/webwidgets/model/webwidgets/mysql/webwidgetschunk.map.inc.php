<?php

$xpdo_meta_map['webwidgetsChunk'] = [
    'package' => 'webwidgets',
    'version' => '1.1',
    'table' => 'chunks',
    'extends' => 'abstractSimpleObject',
    'tableMeta' => [
        'engine' => 'InnoDB',
    ],
    'fields' => [
        'name' => NULL,
        'parser_class' => 'modParser',
        'description' => NULL,
        'code_header' => NULL,
        'code_footer' => NULL,
        'sort_order' => 0,
        'is_active' => 0,
        'properties' => NULL,
    ],
    'fieldMeta' => [
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'parser_class' => [
            'dbtype' => 'varchar',
            'precision' => '100',
            'phptype' => 'string',
            'null' => false,
            'default' => 'modParser',
        ],
        'description' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
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
        'sort_order' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'default' => 0,
        ],
        'is_active' => [
            'dbtype' => 'tinyint',
            'precision' => '1',
            'attributes' => 'unsigned',
            'phptype' => 'boolean',
            'null' => false,
            'default' => 0,
        ],
        'properties' => [
            'dbtype' => 'text',
            'phptype' => 'json',
            'null' => true,
        ],
    ],
    'indexes' => [
        'sort_order' => [
            'alias' => 'sort_order',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'sort_order' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
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
            ],
            'parser_class' => [
                'preventBlank' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOMinLengthValidationRule',
                    'value' => '1',
                    'message' => 'field_required',
                ],
            ],
        ],
    ],
];

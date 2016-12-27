<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'mob_db' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\DebugPDO',
                    'dsn'        => 'mysql:host=localhost;dbname=mob_db',
                    'user'       => 'root',
                    'password'   => 'nbuser',
                    'attributes' => []
                ],
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'mob_db',
            'connections' => ['mob_db']
        ],
        'generator' => [
            'defaultConnection' => 'mob_db',
            'connections' => ['mob_db']
        ]
    ]
];
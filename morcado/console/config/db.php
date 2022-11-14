<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:dbname='.getenv('DB_DATABASE').';host='.getenv('DB_HOST').';port='.getenv('DB_PORT'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public',
        ],
    ],
];

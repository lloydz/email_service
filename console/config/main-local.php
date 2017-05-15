<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=integle_ets',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ],
    ],
];

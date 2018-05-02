<?php

return [
    'class' => 'yii\db\Connection',
    'charset' => 'utf8',
    'dsn' => 'sqlite:' . __DIR__ . '\..\prod.db',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=space-bc-api-postgres;port=5432;dbname=api',
    'username' => 'api',
    'password' => 'secret',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

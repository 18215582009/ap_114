<?php

return [

    'debug'    => false,                 // 是否打开debug功能。
    'logicDel' => false,                 //是否打开逻辑删除
    'persistent' => false,               // 是否打开持久连接。
    'driverMode' => 'Pdo',               // 系统支持pdo、adodb5的驱动，连接数据使用的类（DbAdo或DbPdo）,其中pdo目前mysql、pgsql、odbc，adodb5支持pdo/ado_mssql/odbc_mssql,odbc_oracle,db2/odbc_db2扩展mssql,mysql等

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style. FETCH_OBJ/FETCH_CLASS
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | PDO ERRMODE Style
    |--------------------------------------------------------------------------
    |
    */

    'errorMode' => PDO::ERRMODE_WARNING,


    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'driver' => 'mysql',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */


    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => 'database.sqlite',
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'fc114',
            'username'  => 'root',
            'password'  => '',
            'port'      => '3306',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'fc_',
            'strict'    => false,
            'engine'    => null,
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => 'localhost',
            'database' => 'forge',
            'username' => 'forge',
            'password' => '',
            'port'     => '5432',
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => 'localhost',
            'database' => 'forge',
            'username' => 'forge',
            'password' => '',
            'port'     => '1433',
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => 'localhost',
            'password' => null,
            'port'     => 6379,
            'database' => 0,
        ],

    ],

];

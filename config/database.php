<?php

return [

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

    'default' => env('DB_CONNECTION', 'mysql'),

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
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

		'mysql_tunnel' => [
		'driver'    => 'mysql',
		'host'      => env('TUNNELER_LOCAL_ADDRESS'),
		'port'      => env('TUNNELER_LOCAL_PORT'),
		'database'  => env('DB_DATABASE'),
		'username'  => env('DB_USERNAME'),
		'password'  => env('DB_PASSWORD'),
		'charset'   => env('DB_CHARSET', 'utf8'),
		'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
		'prefix'    => env('DB_PREFIX', ''),
		'timezone'  => env('DB_TIMEZONE', '+00:00'),
		'strict'    => env('DB_STRICT_MODE', false),
	],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => env('DB_ENGINE', 'MyISAM')
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],
		
		  'rabbitmq' => [

        'driver' => 'rabbitmq',

        /*
         * Set to "horizon" if you wish to use Laravel Horizon.
         */
        'worker' => env('RABBITMQ_WORKER', 'default'),

        'dsn' => env('RABBITMQ_DSN', null),

        /*
         * Could be one a class that implements \Interop\Amqp\AmqpConnectionFactory for example:
         *  - \EnqueueAmqpExt\AmqpConnectionFactory if you install enqueue/amqp-ext
         *  - \EnqueueAmqpLib\AmqpConnectionFactory if you install enqueue/amqp-lib
         *  - \EnqueueAmqpBunny\AmqpConnectionFactory if you install enqueue/amqp-bunny
         */

        'factory_class' => Enqueue\AmqpLib\AmqpConnectionFactory::class,

        'host' => env('RABBITMQ_HOST', '127.0.0.1'),
        'port' => env('RABBITMQ_PORT', 5672),

        'vhost' => env('RABBITMQ_VHOST', '/'),
        'login' => env('RABBITMQ_LOGIN', 'imediasun'),
        'password' => env('RABBITMQ_PASSWORD', 'sunimedia'),

        'queue' => env('RABBITMQ_QUEUE', 'default'),

        'options' => [

            'exchange' => [

                'name' => env('RABBITMQ_EXCHANGE_NAME'),

                /*
                 * Determine if exchange should be created if it does not exist.
                 */

                'declare' => env('RABBITMQ_EXCHANGE_DECLARE', true),

                /*
                 * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
                 */

                'type' => env('RABBITMQ_EXCHANGE_TYPE', \Interop\Amqp\AmqpTopic::TYPE_DIRECT),
                'passive' => env('RABBITMQ_EXCHANGE_PASSIVE', false),
                'durable' => env('RABBITMQ_EXCHANGE_DURABLE', true),
                'auto_delete' => env('RABBITMQ_EXCHANGE_AUTODELETE', false),
                'arguments' => env('RABBITMQ_EXCHANGE_ARGUMENTS'),
            ],

            'queue' => [

                /*
                 * Determine if queue should be created if it does not exist.
                 */

                'declare' => env('RABBITMQ_QUEUE_DECLARE', true),

                /*
                 * Determine if queue should be binded to the exchange created.
                 */

                'bind' => env('RABBITMQ_QUEUE_DECLARE_BIND', true),

                /*
                 * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
                 */

                'passive' => env('RABBITMQ_QUEUE_PASSIVE', false),
                'durable' => env('RABBITMQ_QUEUE_DURABLE', true),
                'exclusive' => env('RABBITMQ_QUEUE_EXCLUSIVE', false),
                'auto_delete' => env('RABBITMQ_QUEUE_AUTODELETE', false),
                'arguments' => env('RABBITMQ_QUEUE_ARGUMENTS'),
            ],
        ],

        /*
         * Determine the number of seconds to sleep if there's an error communicating with rabbitmq
         * If set to false, it'll throw an exception rather than doing the sleep for X seconds.
         */

        'sleep_on_error' => env('RABBITMQ_ERROR_SLEEP', 5),

        /*
         * Optional SSL params if an SSL connection is used
         * Using an SSL connection will also require to configure your RabbitMQ to enable SSL. More details can be founds here: https://www.rabbitmq.com/ssl.html
         */

        'ssl_params' => [
            'ssl_on' => env('RABBITMQ_SSL', false),
            'cafile' => env('RABBITMQ_SSL_CAFILE', null),
            'local_cert' => env('RABBITMQ_SSL_LOCALCERT', null),
            'local_key' => env('RABBITMQ_SSL_LOCALKEY', null),
            'verify_peer' => env('RABBITMQ_SSL_VERIFY_PEER', true),
            'passphrase' => env('RABBITMQ_SSL_PASSPHRASE', null),
        ],   

    ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

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

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];

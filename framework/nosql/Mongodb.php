<?php

namespace Framework\Nosql;

use Framework\App;
use MongoDB\Client;

/**
 * MongoDB操作类
 *
 * mongodb class
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class MongoDB
{
    /**
     * 初始化
     *
     * Init
     */
    public static function init()
    {
        $config = App::$container->getSingle('config');
        $config = $config->config['mongoDB'];
        $client = new Client(
            "{$config['host']}:{$config['port']}",
            [
                'database' => $config['database'],
                'username' => $config['username'],
                'password' => $config['password']
            ]
        );
        $database = $client->selectDatabase($config['database']);
        return $database;
    }
}

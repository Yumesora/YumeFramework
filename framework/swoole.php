<?php

use Framework\Handles\ErrorHandle;
use Framework\Handles\ExceptionHandle;
use Framework\Handles\EnvHandle;
use Framework\Handles\RouterSwooleHandle;
use Framework\Handles\ConfigHandle;
use Framework\Handles\LogHandle;
use Framework\Handles\NosqlHandle;
use Framework\Handles\UserDefinedHandle;
use Framework\Exceptions\CoreHttpException;
use Framework\Request;
use Framework\Response;

/**
 * 引入框架文件
 *
 * Require framework
 */
require(__DIR__ . '/App.php');

try {
    //------------------------------------------------------------------------//
    //                                  INIT                                  //
    //------------------------------------------------------------------------//

    /**
     * 初始化应用
     *
     * Init framework
     */
    $app = new Framework\App(__DIR__ . '/..', function () {
        return require(__DIR__ . '/Load.php');
    });
    // set the app running mode
    $app->runningMode = 'cli';

    //-----------------------------------------------------------------------//
    //                         LOADING HANDLE MODULE                         //
    //-----------------------------------------------------------------------//

    /**
     * 挂载handles
     *
     * Load all kinds of handles
     */
    $app->load(function () {
        // 加载预环境参数机制 Loading env handle
        return new EnvHandle();
    });

    $app->load(function () {
        // 加载预定义配置机制 Loading config handle
        return new ConfigHandle();
    });

    $app->load(function () {
        // 加载日志处理机制 Loading log handle
        return new LogHandle();
    });

    $app->load(function () {
        // 加载错误处理机制 Loading error handle
        return new ErrorHandle();
    });

    $app->load(function () {
        //  加载异常处理机制 Loading exception handle.
        return new ExceptionHandle();
    });

    $app->load(function () {
        // 加载nosql机制 Loading nosql handle
        return new NosqlHandle();
    });

    $app->load(function () {
        // 加载用户自定义机制 Loading user-defined handle
        return new UserDefinedHandle();
    });

    $app->load(function () {
        // 加载路由机制 Loading route handle
        return new RouterSwooleHandle();
    });

    /**
     * 启动应用
     *
     * Start framework
     */
    $app->run(function () use ($app) {
        return new Request($app);
    });

    return $app;
} catch (CoreHttpException $e) {
    /**
     * 捕获异常
     *
     * Catch exception
     */
    $e->reponse();
}

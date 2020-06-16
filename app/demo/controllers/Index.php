<?php

namespace App\Demo\Controllers;

use Framework\App;
use Easy\Log;

/**
 * Index Controller
 *
 * @desc default controller
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class Index
{
    /**
     * 控制器构造函数
     */
    public function __construct()
    {
        # code...
    }

    /**
     * default action
     */
    public function hello()
    {
        return 'Hello Yume PHP';
    }

    /**
     * 演示
     *
     * @param   string $username 用户名
     * @param   string $password 密码
     * @param   number code      验证码
     * @example domain/Demo/Index/test?username=tigerb&password=123456789987&code=123456
     * @return  json
     */
    public function test()
    {
        $request = App::$container->get('request');
        $request->check('username', 'require');
        $request->check('password', 'length', 12);
        $request->check('code', 'number');
        return [
            'username' =>  $request->get('username', 'default value')
        ];
    }

    /**
     * 框架内部调用演示
     *
     * 极大的简化了内部模块依赖的问题
     *
     * 可构建微单体建构
     *
     * @example domain/Demo/Index/micro
     * @return  json
     */
    public function micro()
    {
        return App::$app->get('demo/index/hello', [
            'user' => 'Yume'
        ]);
    }

    /**
     * 容器内获取实例演示
     *
     * @return void
     */
    public function getInstanceFromContainerDemo()
    {
        // 请求对象
        App::$container->get('request');
        // 配置对象
        App::$container->getSingle('config');

        return [];
    }

    /**
     * 写日志实例演示
     *
     * @return void
     */
    public function log()
    {
        Log::debug('Yume PHP');
        Log::notice('Yume PHP');
        Log::warning('Yume PHP');
        Log::error('Yume PHP');

        return [];
    }

    /**
     * 容器内获取nosql实例演示
     *
     * @return void
     */
    public function nosqlDemo()
    {
        // redis对象
        App::$container->getSingle('redis');
        // memcahe对象
        App::$container->getSingle('memcached');
        // mongodb对象
        App::$container->getSingle('mongoDB');

        return [];
    }
}

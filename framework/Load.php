<?php

namespace Framework;

use Framework\App;
use Framework\Exceptions\CoreHttpException;

/**
 * 注册加载handle
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class Load
{
    /**
     * 类名映射
     *
     * @var array
     */
    public static $map = [];

    /**
     * 类命名空间映射
     *
     * @var array
     */
    public static $namespaceMap = [];

    /*
    |--------------------------------------------------------------------------
    | Register The Auto Loader
    |--------------------------------------------------------------------------
    |
    | Composer provides a convenient, automatically generated class loader for
    | our application. We just need to utilize it! We'll simply require it
    | into the script here so that we don't have to worry about manual
    | loading any of our classes later on. It feels great to relax.
    |
    | @param  App $app 框架实例
    | @return mixed
    */
    #The Auto Loader - 自动加载程序
    public static function register(App $app)
    {
        self::$namespaceMap = [
            'Framework' => $app->rootPath
        ];

        // 注册框架加载函数　不使用composer加载机制加载框架　自己实现
        spl_autoload_register(['Framework\Load', 'autoload']);

        // 引入composer自加载文件
        require($app->rootPath . '/vendor/autoload.php');
    }

    /**
     * 自加载函数
     *
     * @param  string $class 类名
     *
     * @return void
     */
    private static function autoload($class)
    {
        $classOrigin = $class;
        $classInfo   = explode('\\', $class);
        $className   = array_pop($classInfo);
        foreach ($classInfo as &$v) {
            $v = strtolower($v);
        }
        unset($v);
        array_push($classInfo, $className);
        $class       = implode('\\', $classInfo);
        $path        = self::$namespaceMap['Framework'];
        $classPath   = $path . '/' . str_replace('\\', '/', $class) . '.php';

        /**
         * [tideways optimize]
         * 通过tideways分析file_exists性能消耗偏多 注释掉 文件不存在 直接底层异常
         * 此处性能提升10ms左右
         */
        // if (!file_exists($classPath)) {
        //     // 框架级别加载文件不存在　composer加载
        //     return;
        //     throw new CoreHttpException(404, "$classPath Not Found");
        // }
        self::$map[$classOrigin] = $classPath;
        require $classPath;
    }
}

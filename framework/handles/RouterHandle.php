<?php

namespace Framework\Handles;

use Framework\App;
use Framework\Exceptions\CoreHttpException;
use ReflectionClass;
use Closure;
use Framework\Router\Job;
use Framework\Router\YumeRouter;

/**
 * 路由处理机制.
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class RouterHandle implements Handle
{
    /**
     * 注册路由处理机制.
     *
     * @param App $app 框架实例
     * @param void
     */
    public function register(App $app)
    {
        // 初始化路由模块入口类
        (new YumeRouter())->init($app);
    }
}

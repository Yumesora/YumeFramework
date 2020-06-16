<?php

namespace Framework\Handles;

use Framework\App;
use Framework\Exceptions\CoreHttpException;
use Closure;
use Framework\Router\YumeSwooleRouter;

/**
 * 路由处理机制.
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class RouterSwooleHandle implements Handle
{
    /**
     * 注册路由处理机制.
     *
     * @param App $app 框架实例
     * @param void
     */
    public function register(App $app)
    {
        App::$container->set('router', function () {
            return new YumeSwooleRouter();
        });
    }
}

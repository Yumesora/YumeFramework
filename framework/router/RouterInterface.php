<?php

namespace Framework\Router;

use Framework\Router\Router;

/**
 * 路由策略接口.
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
interface RouterInterface
{
    /**
     * 路由方法
     *
     * @param void
     */
    public function route(Router $entrance);
}

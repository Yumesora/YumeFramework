<?php

namespace Framework\Traits;

/**
 * global constant manager
 */
trait GlobalConstant
{
    /**
     * register constant
     */
    public function registerGlobalConst()
    {
        define('NOW_TIME', time());
        define('NOW_MICROTIME', microtime(true));
    }
}

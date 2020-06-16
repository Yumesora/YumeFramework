<?php

namespace Framework\Handles;

use Framework\App;

interface Handle
{
    /**
     * 注册处理机制
     *
     * @author Suzuki Yume <https://github.com/Yumesora>
     * @return mixed
     */
    public function register(App $app);
}

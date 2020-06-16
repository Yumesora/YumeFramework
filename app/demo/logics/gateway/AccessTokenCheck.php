<?php

namespace App\Demo\Logics\Gateway;

use Framework\Request;
use App\Demo\Logics\Gateway\Check;
use Framework\Exceptions\CoreHttpException;

/**
 * 检验移动端app授权key
 */

class CheckAccessToken extends Check
{

    /**
     * 移动端app网关规则
     *
     * @param Request $request 请求对象
     */
    public function doCheck(Request $request)
    {
        # do nothing ...
    }
}

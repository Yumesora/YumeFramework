<?php

/**
 * Yume PHP
 *
 * A lightweight PHP framework for studying
 *
 * author: Suzuki Yume <https://github.com/Yumesora>
 */

namespace App\Demo\Controllers;

/**
 * Demo Controller
 *
 * @author Suzuki Yume <https://github.com/Yumesora>
 */
class Demo
{
    /**
     * 控制器构造函数
     */
    public function __construct()
    {
        # code...
    }

    /**
     * api
     *
     * @example domain/demo/demo/get
     */
    public function get()
    {
        $data = [
            'content' => 'A lightweight PHP framework for studying, Why do we need to build a PHP framework by ourself? Maybe the most of people will say "There have so many PHP frameworks be provided, but we still made a wheel?". My point is "Made a wheel is not our purpose, we will get some konwledge when making a wheel which is our really purpose".'
        ];
        $data = array_fill(0, 20, $data);
        return $data;
    }
}

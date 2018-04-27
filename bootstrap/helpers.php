<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/27
 * Time: 14:07
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
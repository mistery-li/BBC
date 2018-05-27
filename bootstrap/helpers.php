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

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}

function model_admin_link($title, $model)
{
    return model_link($title, $model, 'admin');
}

function model_link($title, $model, $prefix = '')
{
    // 获取数据模型的附属蛇形命名
    $model_name = model_plural_name($model);

    $prefix = $prefix ? "/$prefix/" : '/';

    $url = config('app.url') . $prefix . $model_name . '/' . $model->id;

    return '<a href="' . $url . '" target="_blank">' . $title . '</a>';
}

function model_plural_name($model)
{
    // 从实体中获取完整类名， 例如：APP\Models\User
    $full_class_name = get_class($model);

    // 获取基础类名，传参 `App\Models\User` 得到 `User`
    $class_name = class_basename($full_class_name);

    // 蛇形命名 User -> user FooBar -> foo_bar
    $sname_case_name = snake_case($class_name);

    // 获取子串的形式， user->users
    return str_plural($sname_case_name);
}
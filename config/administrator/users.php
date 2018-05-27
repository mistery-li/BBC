<?php

use App\Models\User;

return [
    'title' => '用户',

    // 模型单数，用作页面【新建￥single】
    'single' => '用户',

    // 数据模型，用作数据的CRUD
    'model' => User::class,

    // 设置当前页面的访问权限，通过返回布尔值来控制权限
    // 返回True即通过权限验证，False  则无权访问并从Menu隐藏
    'permission' => function ()
    {
        return Auth::user()->can('manage_users');
    },

    // 字段负责渲染【数据表格】, 由无数的列组成
    'columns' => [
        // 列的标示， 最小化【列】信息配置的例子
        'id',

        'avatar' => [
            'title' => '头像',
            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            // 是否允许排序
            'sortable' => false,
        ],

        'name' => [
            'title' => '用户名',
            'sortable' => false,
            'output' => function ($name, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
        ],

        'email' => [
            'title' => '邮箱',
        ],

        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    // 模型表单 设置项
    'edit_fields' => [
        'name' => [
            'title' => '用户名',
        ],
        'email' => [
            'title' => '邮箱',
        ],
        'password' => [
            'title' => '密码',

            // 表单使用input类型password
            'type' => 'password',
        ],
        'avatar' => [
            'title' => '用户头像',

            'type' => 'image',

            'location' => public_path() . '/uploads/images/avatars/',
        ],

        'roles' => [
            'title' => '用户角色',

            'type' => 'relationship',

            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '用户 ID',
        ],

        'name' => [
            'title' => '用户名',
        ],

        'email' => [
            'title' => '邮箱',
        ],
    ],
];
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/29
 * Time: 15:05
 */
namespace App\Handlers;

use Image;

class ImageUploadHandler
{
    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // 构建文件夹规则
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // 储存路径
        $upload_path = public_path() . '/' . $folder_name;

        // 获取后缀名，确保黏贴图片后后缀名不为空
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        $file->move($upload_path, $filename);

        return [
            'path' => config('app.url') . "/folder_name/$filename"
        ];
    }
}
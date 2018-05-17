<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;

    public function __construct(Topic $topic)
    {
        //  任务队列构造器接受Eloquent模型，将会只序列化模型的ID
        $this->topic = $topic;
    }

    public function handle()
    {
        // 请求百度API接口进行翻译
        $slug = app(SlugTranslateHandler::class)->translate($this->topic->title);

        // 避免模型监控器死循环，使用DB类直接对数据库操作
        \DB::table('topics')->where('id', $this->topic->id)->update(['slug' => $slug]);
    }
}

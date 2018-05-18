<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        // 所有用户ID数组， 【1,2,3】
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有话题ID数组
        $topic_ids = Topic::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)
            ->times(1000)
            ->make()
            ->each(function ($reply, $index)
            use ($user_ids, $topic_ids, $faker) {
                // 从用户ID随机取数
                $reply->user_id = $faker->randomElement($user_ids);

                $reply->topic_id = $faker->randomElement($topic_ids);
            });

        Reply::insert($replys->toArray());
    }
}


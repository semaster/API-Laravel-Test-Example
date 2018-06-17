<?php

use Faker\Generator as Faker;
use App\Task;
use App\Comment;
use Carbon\Carbon;

$factory->define(Comment::class, function (Faker $faker) {
	$task = Task::inRandomOrder()->first();
    return [
        'comment' => $faker->sentence,
        'task_id' => $task->id,
        'reminder_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
    ];
});

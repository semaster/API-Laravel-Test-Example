<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use App\Task;
use App\User;
use App\Comment;

class CommentTest extends TestCase
{
    /**
     * Tests that comment add endpoint works correctly.
     */
    public function testsCommentAreCreatedCorrectly()
    {
    	$user = User::find(1);
	    $task = Task::inRandomOrder()->first();
	    $faker = \Faker\Factory::create();
	    $sentence = $faker->sentence;
        $headers = ['Authorization' => "Bearer ".$user->api_token];
        $payload = [
            'comment' => $sentence,
            'task_id' => $task->id,
            'reminder_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
        ];

        $this->json('POST', '/api/comment', $payload, $headers)
            ->assertStatus(201)
            ->assertJson(['task_id' => $task->id, 'comment' => $sentence, 'reminder_date' => Carbon::tomorrow()->format('Y-m-d H:i:s')]);
    }

    public function testsCommentAreUpdatedCorrectly()
    {
    	$user = User::find(1);
	    $task = Task::inRandomOrder()->first();
	    $faker = \Faker\Factory::create();
	    $comment = factory(Comment::class)->create();
	    $sentence = $faker->sentence;
	    $updated_reminder = Carbon::tomorrow()->addDays(2)->format('Y-m-d H:i:s');
        $headers = ['Authorization' => "Bearer ".$user->api_token];
        $payload = [
            'comment' => $sentence,
            'task_id' => $task->id,
            'reminder_date' => $updated_reminder,
        ];

        $this->json('PUT', '/api/comment/'.$comment->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['task_id' => $task->id, 'comment' => $sentence, 'reminder_date' => $updated_reminder]);
    }
}

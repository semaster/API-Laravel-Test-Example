<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Task::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few tasks in our database:
        for ($i = 0; $i < 50; $i++) {
            $task = Task::create([
                'description' => $faker->sentence,
                'status' => $faker->randomElement(['New', 'InProgress', 'Closed']),
                'type'   => $faker->randomElement(['Bug', 'Feature', 'Enhancement']),
            ]);
            //and seed pivot table too
            $task->users()->sync([$faker->randomDigit]); // we can pass array of role ids
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = factory('App\Task',100)->create();
        factory('App\Project',3)->create();
        $tags = factory('App\Tag',10)->create();


        foreach ($tasks as $task) {
            $randomtags =  $tags->random(3);   
            $task->tags()->sync($randomtags);
        }
    }
}

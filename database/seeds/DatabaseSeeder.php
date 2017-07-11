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
        factory('App\Task',100)->create();
        factory('App\Project',3)->create();
        factory('App\TaskProject',100)->create();
    }
}

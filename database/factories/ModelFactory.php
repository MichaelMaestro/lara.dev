<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lexify,
        'complete' => false,
        'user_id'=> rand(1,3),
        'project_id' =>rand(1,3),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'body'=>$faker->word, 
    ];
});


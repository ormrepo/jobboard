<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'reference' => $faker->domainWord,
        'employer' => $faker->company,
        'title' => $faker->jobTitle,
        'location' => $faker->city,
        'salary' => $faker->numberBetween($min = 1000, $max = 9000),
        'post_date' => $faker->dateTimeBetween($startDate = '-30 years',
            $endDate = 'now', $timezone = date_default_timezone_get()),
        'type' => $faker->jobTitle,
        'description' => $faker->sentence
    ];
});

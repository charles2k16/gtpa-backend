<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Mentor;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\User;

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

$factory->define(Mentor::class, function (Faker $faker) {
 

  return [
    'user_id' => User::all()->random()->id,
    'title' => $faker->name,
    'occupation' => $faker->jobTitle(),
    'organization' => $faker->name,
    'bio' => $faker->sentence(),
    'country' => $faker->country(),
    'city' => $faker->city(),
    'phone_number' => $faker->numberBetween(0, 9),
    'mentorship_areas' => json_encode(["key" => $faker->randomElement(['ben.png', 'charl.png', 'dick.png', 'adjoa.png'])] ),
    'profile_picture' => $faker->randomElement(['ben.png', 'charl.png', 'dick.png', 'adjoa.png']),
  ];
});

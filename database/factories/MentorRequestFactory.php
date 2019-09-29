<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\MentorRequest;
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

$factory->define(MentorRequest::class, function (Faker $faker) {
  return [
    'description' => $faker->sentence(),
    'location' => $faker->city(),
    'duration' => $faker->word,
    'mentorship_areas' => json_encode(["key" => $faker->randomElement(['sceince', 'buisness', 'math', 'adjo'])] ),
    'status' => $faker->randomElement([MentorRequest::PENDING_STATUS, MentorRequest::REJECTED_STATUS]),
    'mentor_id' =>  User::all()->random()->id,
    'mentee_id' =>  User::all()->random()->id,
    'commencement_date' => $faker->date('Y-m-d', 'now'),
    'reasons_for_reject' => $faker->sentence(),
  ];
});

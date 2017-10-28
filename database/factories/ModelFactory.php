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
$factory->define(App\User::class, function (Faker\Generator $faker) {
  static $password;

  return [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'password' => $password ?: $password = bcrypt('password'),
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\WishlistItem::class, function (Faker\Generator $faker) {
  static $user_id;
  static $randomUser;

  return [
    'title' => $faker->word,
    'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'link' => $faker->url,
    'user_id' => $user_id,
    // Generate buyer that is not current user
    'buyer_id' => function (array $user) {
      $randomUser = $user['user_id'];
      while ($randomUser === $user['user_id']) {
        $randomUser = App\User::inRandomOrder()->first()->id;
      }
      return $randomUser;
    }
  ];
});

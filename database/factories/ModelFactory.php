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

use App\Http\Utilities\Country;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Flyer::class, function (Faker\Generator $faker) {

    return [
		'user_id'		=> factory('App\User')->create()->id,
        'street'        => $faker->streetAddress,
        'city'          => $faker->city,   
        'zip'           => $faker->postcode,  
        'state'         => $faker->state, 
        'country'       => Country::code($faker->country),         
        'price'         => $faker->numberBetween(10000, 5000000),           
        'description'   => $faker->paragraphs(3, true)
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {

    return [
		'title'			=> $faker->sentence(3),
        'description'   => $faker->sentence(7),
        'done'          => false
    ];
});
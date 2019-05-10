<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Client;
use Illuminate\Support\Str;
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

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'email'     =>  $faker->email,
        'address'   => [
            'street'    =>  $faker->streetAddress,
            'city'      =>  $faker->city,
            'province'  =>  $faker->stateAbbr,
            'postal'    =>  $faker->postcode
        ],
        'phone'     =>     $faker->phoneNumber,
        'notes'     =>     $faker->realText()
    ];
});

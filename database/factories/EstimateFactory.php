<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Estimate;
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

$factory->define(Estimate::class, function (Faker $faker) {
    return [
        'ref'           =>  uniqid(),
        'client_id'     =>  mt_rand(1, 50),
        'issue_date'    =>  $faker->date,
        'status'        =>  mt_rand(1, 4),
        'notes'          =>  $faker->realText(50),
        'payment_terms' =>  'Due immediately',
        'line_items'    =>  [
            [
                'description'   =>  $faker->realText(mt_rand(10, 20)),
                'quantity'      =>  mt_rand(1, 40),
                'rate'          =>  mt_rand(20, 80)
            ],
            [
                'description'   =>  $faker->realText(mt_rand(10, 20)),
                'quantity'      =>  mt_rand(1, 40),
                'rate'          =>  mt_rand(20, 80)
            ],
            [
                'description'   =>  $faker->realText(mt_rand(10, 20)),
                'quantity'      =>  mt_rand(1, 40),
                'rate'          =>  mt_rand(20, 80)
            ]
        ],
        // 'expense_items'     =>  [
        //     [
        //         'description'       =>  $faker->realText(mt_rand(10, 20)),
        //         'price'             =>  $price = mt_rand(5, 100),
        //         'tax'               =>  $price * 0.05,
        //         'payment_method'    =>  mt_rand(1, 6),
        //         'memo'              =>  $faker->realText(mt_rand(10, 30)),
        //         'date'              =>  $faker->date
        //     ],
        //     [
        //         'description'       =>  $faker->realText(mt_rand(10, 20)),
        //         'price'             =>  $price = mt_rand(5, 100),
        //         'tax'               =>  $price * 0.05,
        //         'payment_method'    =>  mt_rand(1, 6),
        //         'memo'              =>  $faker->realText(mt_rand(10, 30)),
        //         'date'              =>  $faker->date
        //     ]
        // ]
    ];
});

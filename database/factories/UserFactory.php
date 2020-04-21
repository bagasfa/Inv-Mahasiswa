<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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


$factory->define(User::class, function (Faker $faker) {

	$listRole = [
        	'admin',
        	'staff'
        ];

    $list_foto = [
            'example.jpg',
            'example2.jpg',
    ];

    return [
        'nama_user' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'), // password
        'role' => $faker->unique()->randomElement($listRole),
        'foto' => $faker->randomElement($list_foto)
    ];
});

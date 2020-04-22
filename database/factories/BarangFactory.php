<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

    $list_barang = [
            'AC',
            'Proyektor',
            'LCD',
            'Parfum',
            'Kursi'
        ];

    $list_foto = [
            'example.png',
            'example2.png',
            'example3.png',
            'example4.png',
            'example5.png'
    ];

    return [
        'id_ruangan' => $faker->unique()->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'nama_barang' => $faker->unique()->randomElement($list_barang),
        'total' => $faker->numberBetween($min = 1, $max = 5),
        'broken' => $faker->numberBetween($min = 0, $max = 3),
        'foto' => $faker->unique()->randomElement($list_foto),
        'created_by' => 1
    ];
});

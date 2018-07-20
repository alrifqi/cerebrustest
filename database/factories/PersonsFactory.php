<?php

use Faker\Generator as Faker;
use App\Person;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'nama_lengkap' => $faker->nama_lengkap,
        'jenis_kelamin' => $faker->jenis_kelamin,
        'tanggal_lahir' => $faker->tanggal_lahir,
        'no_telepon' => $faker->no_telepon,
        'email' => $faker->email,
        'alamat' => $faker->alamat
    ];
});

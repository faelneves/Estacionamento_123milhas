<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Proprietario::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->numerify('#########'),
        'email' => $faker->unique()->safeEmail,
        'CPF' => $faker->numerify('###########')
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContacto;
use Faker\Generator as Faker;

$factory->define(SiteContacto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->email,
        'motivo_contacto' => $faker->numberBetween(1,3),
        'mensagem' => $faker->text
    ];
});

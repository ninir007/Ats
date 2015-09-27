<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'FirstName' => $faker->firstName,
        'LastName'  => $faker->lastName,
        'Address'   => $faker->streetAddress,
        'Email'     => $faker->email,
        'Mobile'    => $faker->phoneNumber,
        'Office'    => $faker->phoneNumber,
        'Fax'       => $faker->phoneNumber,
        'Tva'       => $faker->numberBetween(10000,100000),

    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,

    ];
});





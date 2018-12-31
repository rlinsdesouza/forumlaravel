<?php

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

/*
    Referencia utilizada para o Faker
    https://github.com/fzaninotto/Faker


*/

$factory->define(forum\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(forum\Models\Tema::class, function (Faker $faker) {
    return [
        'titulotema' => $faker->sentence,
        'descricaotema' => $faker->paragraph,
        'user_id' => forum\User::all()->random()->id,
    ];
});

$factory->define(forum\Models\Postagem::class, function (Faker $faker) {
    return [
        'titulopost'=>$faker->sentence,
        'descricaopost'=>$faker->paragraph,
        'likes'=>$faker->randomDigit,
        'dislikes'=>$faker->randomDigit,
        'tema_id'=>forum\Models\Tema::all()->random()->id,
        'user_id'=>forum\User::all()->random()->id,
    ];
});

$factory->define(forum\Models\Resposta::class, function (Faker $faker) {
    return [
        'resposta'=>$faker->paragraph,
        'likes'=>$faker->randomDigit,
        'dislikes'=>$faker->randomDigit,
        'user_id'=>forum\User::all()->random()->id,
        // 'respostavel_id' =>forum\Models\Postagem::all()->random()->id,
        'respostavel_id'=>forum\Models\Postagem::all()->random()->id,
        'respostavel_type'=>function () {
            $input = ['forum\Models\Postagem', 'forum\Models\Resposta'];
            $model = $input[mt_rand(0,count($input)-1)];
            return $model;
        }
    ];
});

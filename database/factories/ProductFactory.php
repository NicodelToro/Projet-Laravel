<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        
        'title' => $faker->words(2, true),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 19.99, $max = 999.99),      
        'size' => $faker->randomElement($array = ['46', '48', '50', '52']),
        'url_image' => $faker->sentence(),
        'code' => $faker->randomElement($array =['soldes', 'new']),
        'reference'=> $faker->isbn10()
    ];
});

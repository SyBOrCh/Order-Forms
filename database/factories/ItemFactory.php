<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'action'    => 'fake-collect',
        'type'      => 'waste container',
    ];
});

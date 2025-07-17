<?php

use Illuminate\Support\Arr;

require '../vendor/autoload.php';

// Helpers
$data = [
    'query' => [
        'filters' => [
            'price'    => [
                'min' => 100,
                'max' => 200,
            ],
            'category' => [
                'toys',
            ],
        ],
    ],
];
dump($data);

print 'data_get($data, "query.filters.price.min")'.PHP_EOL;
dump(data_get($data, 'query.filters.price.min'));
print 'data_get($data, "query.filters.category.*")'.PHP_EOL;
dump(data_get($data, 'query.filters.category.*'));

print 'data_set($data, "query.filters.category", ["home", "garden", "car"])'.PHP_EOL;
dump(data_set($data, 'query.filters.category', ['home', 'garden', 'car']));

print 'data_get($data, "query.filters.category.{first}")'.PHP_EOL;
dump(data_get($data, 'query.filters.category.{first}'));
print 'data_get($data, "query.filters.category.1")'.PHP_EOL;
dump(data_get($data, 'query.filters.category.1'));
print 'data_get($data, "query.filters.category.{last}")'.PHP_EOL;
dump(data_get($data, 'query.filters.category.{last}'));

// Arr class
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
print 'Arr::where($array, fn($value) => $value % 2 === 0)'.PHP_EOL;
dump(Arr::where($array, fn($value) => $value % 2 === 0));

print 'Arr::join($array, ", ")'.PHP_EOL;
dump(Arr::join($array, ', '));
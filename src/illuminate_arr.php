<?php

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

// TODO: Arr class
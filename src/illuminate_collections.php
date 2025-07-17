<?php

use Illuminate\Support\Collection;

require '../vendor/autoload.php';

$collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);

# Check the existence of element and removal
print '$collection->contains(5)'.PHP_EOL;
dump($collection->contains(5));
$collection->forget($collection->search(5));
unset($collection[1]);
print '$collection->has(4)'.PHP_EOL;
dump($collection->has(4));

# Accessing keys and values separately as arrays
print '$collection->keys()'.PHP_EOL;
dump($collection->keys());
print '$collection->values()'.PHP_EOL;
dump($collection->values());

# Adding / setting elements in the collection
$collection->push(10);
$collection->put(4, 5);
$collection[1] = 2;
print '$collection->toArray()'.PHP_EOL;
dump($collection->toArray());

# Counting elements and checking for empty
print '$collection->count(), count($collection))'.PHP_EOL;
dump($collection->count(), count($collection));
print '$collection->isEmpty()'.PHP_EOL;
dump($collection->isEmpty());

# Accessing elements
print '$collection[1], $collection->get(1) $collection->first(), $collection->last())'.PHP_EOL;
dump($collection[1], $collection->get(1));
dump($collection->first());
dump($collection->last());

# Check predicate about elements
print '$collection->some(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->some(fn($element) => $element % 2 === 0));

print '$collection->every(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->every(fn($element) => $element % 2 === 0));

print '$collection->each(fn($element) => dump($element))'.PHP_EOL;
dump($collection->each(fn($element) => dump($element)));

print '$collection->first(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->first(fn($element) => $element % 2 === 0));

# Apply callables on collections to get other collections
print '$collection->filter(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->filter(fn($element) => $element % 2 === 0));
print '$collection->partition(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->partition(fn($element) => $element % 2 === 0));
print '$collection->map(fn($element) => $element * 2)'.PHP_EOL;
dump($collection->map(fn($element) => $element * 2));

# Reduce collection's elements to one computed value
print '$collection->reduce(fn($carry, $element) => $element * $carry, 1)'.PHP_EOL;
var_dump($collection->reduce(fn($carry, $element) => $element * $carry, 1));

# Grouping elements by a given column value or callable return

$collection = collect([
    ['name' => 'Dan', 'country' => 'Romania'],
    ['name' => 'Alex', 'country' => 'Romania'],
    ['name' => 'Maria', 'country' => 'Bulgaria'],
]);

print '$collection->groupBy("country")'.PHP_EOL;
dump($collection->groupBy('country'));

print '$collection->groupBy(fn($item) => substr($item->country, 0, 2))'.PHP_EOL;
dump(
    $collection->groupBy(
        fn($item) => match ($item['country']) {
            'Romania' => 'RO',
            'Bulgaria' => 'BG',
            default => 'Other'
        },
    ),
);

# Adding keys elements by a given column value or callable return
print '$collection->keyBy("name")'.PHP_EOL;
dump($collection->keyBy('name'));

print '$collection->keyBy(fn($item) => strlen($item["name"]))'.PHP_EOL;
dump($collection->keyBy(fn($item) => strlen($item['name'])));

# Extracting certain column value from each element into a nea collection
print '$collection->pluck("name")'.PHP_EOL;
dump($collection->pluck('name'));

// Sort an array of primitive type elements
$collection = collect([2, 5, 1, 7, 3, 6, 4]);
print '$collection->sort()->values()->all()'.PHP_EOL;
dump($collection->sort()->values()->all()); // ascending by default, keeps associations

print '$collection->sort()'.PHP_EOL;
dump($collection->sort(function ($a, $b) {
    return -($a <=> $b); // descending
}));

// Sort collection of structured elements
$collection = collect([
    ['name' => 'Dan', 'age' => 20],
    ['name' => 'Alex', 'age' => 17],
    ['name' => 'Maria', 'age' => 32],
]);

print '$collection->sortBy(fn($item) => $item["age"])'.PHP_EOL;
dump($collection->sortBy(fn($item) => $item['age']));

// Higher order messages
print '$collection->avg->age'.PHP_EOL;
dump($collection->avg->age);

print '$collection->map->name'.PHP_EOL;
dump($collection->map->name);

// Extending Collection
Collection::macro('legalAged', function (int $legalAge = 18) {
    return $this->filter(fn($item) => $item['age'] >= $legalAge);
});
print '$collection->legalAged()'.PHP_EOL;
dump($collection->legalAged());

print '$collection->legalAged(21)'.PHP_EOL;
dump($collection->legalAged(21));
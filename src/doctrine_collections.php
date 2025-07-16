<?php

require '../vendor/autoload.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

$collection = new ArrayCollection([1, 2, 3, 4, 5, 6, 7, 8, 9]);

# Check the existence of element and removal
print '$collection->contains(5)'.PHP_EOL;
dump($collection->contains(5));
$collection->removeElement(5);
unset($collection[1]);
print '$collection->containsKey(4)'.PHP_EOL;
dump($collection->containsKey(4));

# Accessing keys and values separately as arrays
print '$collection->getKeys()'.PHP_EOL;
dump($collection->getKeys());
print '$collection->getValues()'.PHP_EOL;
dump($collection->getValues());

# Adding / setting elements in the collection
$collection->add(10);
$collection->set(4, 5);
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
print '$collection->exists(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->exists(fn($element) => $element % 2 === 0));

print '$collection->forAll(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->forAll(fn($element) => $element % 2 === 0));

print '$collection->findFirst(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->findFirst(fn($element) => $element % 2 === 0));

# Apply callables on collections to get other collections
print '$collection->filter(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->filter(fn($element) => $element % 2 === 0));
print '$collection->partition(fn($element) => $element % 2 === 0)'.PHP_EOL;
dump($collection->partition(fn($element) => $element % 2 === 0));
print '$collection->map(fn($element) => $element * 2)'.PHP_EOL;
dump($collection->map(fn($element) => $element * 2));

# Reduce collection's elements to one computed value
print '$collection->reduce(fn($carry, $element) => $element * $carry, 1)'.PHP_EOL;
dump($collection->reduce(fn($carry, $element) => $element * $carry, 1));

# Match/filter elements using custom criteria
$collection = new ArrayCollection([
    [
        'name'  => 'Dan',
        'score' => 670,
    ],
    [
        'name'  => 'Mihai',
        'score' => 340,
    ],
    [
        'name'  => 'Bogdan',
        'score' => 760,
    ],
    [
        'name'  => 'Maria',
        'score' => 340,
    ],
    [
        'name'  => 'Daniela',
        'score' => 850,
    ],
]);
$criteria = Criteria::create()
    ->where(Criteria::expr()->gt('score', 500))
    ->andWhere(Criteria::expr()->startsWith('name', 'D'))
    ->orderBy(['score' => 'DESC']);

print '$collection->matching($criteria)'.PHP_EOL;
dump($collection->matching($criteria));

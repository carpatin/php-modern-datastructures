<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Illuminate\Support\Str;

// Representation of string values as printable objects
print "Str::of('Résumé, déjà vu, à la carte, café, éclair, fiancé')".PHP_EOL;
$string = Str::of('Résumé, déjà vu, à la carte, café, éclair, fiancé');
dump($string);
print $string.PHP_EOL;

print "str('Résumé, déjà vu, à la carte, café, éclair, fiancé')".PHP_EOL;
$string = str('Résumé, déjà vu, à la carte, café, éclair, fiancé');
dump($string);
print $string.PHP_EOL;

// Trimming at both ends
print '$string->trim("éR")->ltrim("s")->rtrim("nc")->prepend("F")->append("t")'.PHP_EOL;
dump($string->trim('éR')->ltrim('s')->rtrim('nc')->prepend('F')->append('t'));

// Chaining multiple transformations: case change, prepend, append and padding
print '$string->lcfirst()->prepend(\'Le \')->append(\'s\')->padBoth(60, \'!\')'.PHP_EOL;
dump($string->lcfirst()->prepend('Le ')->append('s')->padBoth(60, '!'));

// Checking conditions about a string
print '$string->contains(["café, éclair", "thé"])'.PHP_EOL;
dump($string->contains(['café, éclair', 'thé']));
print '$string->containsAll(["café", "thé"])'.PHP_EOL;
dump($string->containsAll(['café', 'thé']));
print '$string->startsWith("Résumé")'.PHP_EOL;
dump($string->startsWith('Résumé'));
print '$string->endsWith("fiancé")'.PHP_EOL;
dump($string->endsWith('fiancé'));
print '$string->isMatch("/^[\p{L}, ]+$/ui")'.PHP_EOL;
dump($string->isMatch('/^[\p{L}, ]+$/ui'));

// Extracting / replacing substrings
print '$string->substr(-14,6)'.PHP_EOL;
dump($string->substr(-14, 6));
print '$string->substrReplace("banana",-15,6)'.PHP_EOL;
dump($string->substrReplace('banana', -15, 6)); // broken, no UTF-8 support
print '$string->match("/(ca[^,]*),/ui")'.PHP_EOL;
dump($string->match('/(ca[^,]*),/ui'));

// Various formats for standardising multiworld strings
print 'Str::of("ana are mere verzi")->pascal()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->pascal());
print 'Str::of("ana are mere verzi")->camel()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->camel());
print 'Str::of("ana are mere verzi")->snake()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->snake());
print 'Str::of("ana are mere verzi")->kebab()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->kebab());

// Transform to various cases
print 'Str::of("ana are mere verzi")->title()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->title());
print 'Str::of("ana are mere verzi")->lower()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->lower());
print 'Str::of("ana are mere verzi")->upper()'.PHP_EOL;
dump(Str::of('ana are mere verzi')->upper());

// Limiting string to certain lengths
print 'Str::of("ana are mere verzi")->limit(7)'.PHP_EOL;
dump(Str::of('ana are mere verzi')->limit(7));
print 'Str::of("ana are mere verzi")->words(3)'.PHP_EOL;
dump(Str::of('ana are mere verzi')->words(3));
print 'Str::of("ana are mere verzi")->wordWrap(7)'.PHP_EOL;
dump(Str::of('ana are mere verzi')->wordWrap(7));

// Create slugs from sentences
print 'Str::of("Ana are mere: verzi, roșii și ... pere :)")->slug()'.PHP_EOL;
dump(Str::of('Ana are mere: verzi, roșii și ... pere :)')->slug());

// Create UUID
print 'Str::uuid()'.PHP_EOL;
dump(Str::uuid()); // UUID v4, needs: composer require ramsey/uuid

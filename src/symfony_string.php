<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\UnicodeString;

use function Symfony\Component\String\s;

// Representation of string values as printable objects
print "new UnicodeString('Résumé, déjà vu, à la carte, café, éclair, fiancé')".PHP_EOL;
$string = new UnicodeString('Résumé, déjà vu, à la carte, café, éclair, fiancé');
dump($string);
print $string.PHP_EOL;

print "s('Résumé, déjà vu, à la carte, café, éclair, fiancé')".PHP_EOL;
$string = s('Résumé, déjà vu, à la carte, café, éclair, fiancé');
dump($string);
print $string.PHP_EOL;

// Trimming at both ends
print '$string->trim("éR")->trimStart("s")->trimEnd("nc")->prepend("F")->append("t")'.PHP_EOL;
dump($string->trim('éR')->trimStart('s')->trimEnd('nc')->prepend('F')->append('t'));

// Removing unnecessary whitespace
print 's("one  two   three \n\tGO!")->collapseWhitespace(7)'.PHP_EOL;
dump(s("one  two   three \n\tGO!")->collapseWhitespace());

// Chaining multiple transformations: case change, prepend, append and padding
print '$string->slice(0, 1)->lower()->append($string->slice(1)->toString())->prepend(\'Le \')->append(\'s\')->padBoth(60, \'!\')'.PHP_EOL;
dump(
    $string->slice(0, 1)->lower()->append($string->slice(1)->toString())->prepend('Le ')->append('s')->padBoth(60, '!'),
);

// Checking conditions about a string
print '$string->containsAny(["café, éclair", "thé"])'.PHP_EOL;
dump($string->containsAny(['café, éclair', 'thé']));
print '$string->startsWith("Résumé")'.PHP_EOL;
dump($string->startsWith('Résumé'));
print '$string->endsWith("fiancé")'.PHP_EOL;
dump($string->endsWith('fiancé'));

// Extracting / replacing substrings
print '$string->slice(-14,6)'.PHP_EOL;
dump($string->slice(-14, 6));
print '$string->splice("banana",-14,6)'.PHP_EOL;
dump($string->splice('banana', -14, 6)); // better than Str but still not fully OK
print '$string->match("/(ca[^,]*),/ui")'.PHP_EOL;
dump($string->match('/(ca[^,]*),/ui')); // both matches compared to Str

// Extracting parts from string based on what surrounds them
print 's("ana are mere verzi")->after("are")->before("verzi")->trim()'.PHP_EOL;
dump(s('ana are mere verzi')->after('are')->before('verzi')->trim());

// Various formats for standardising multiworld strings
print 's("ana are mere verzi")->pascal()'.PHP_EOL;
dump(s('ana are mere verzi')->pascal());
print 's("ana are mere verzi")->camel()'.PHP_EOL;
dump(s('ana are mere verzi')->camel());
print 's("ana are mere verzi")->snake()'.PHP_EOL;
dump(s('ana are mere verzi')->snake());
print 's("ana are mere verzi")->kebab()'.PHP_EOL;
dump(s('ana are mere verzi')->kebab());

// Transform to various cases
print 's("ana are mere verzi")->title()'.PHP_EOL;
dump(s('ana are mere verzi')->title());
print 's("ana are mere verzi")->lower()'.PHP_EOL;
dump(s('ana are mere verzi')->lower());
print 's("ana are mere verzi")->upper()'.PHP_EOL;
dump(s('ana are mere verzi')->upper());

// Limiting string to certain lengths
print 's("ana are mere verzi")->truncate(7)'.PHP_EOL;
dump(s('ana are mere verzi')->truncate(7));
print 's("ana are mere verzi")->wordwrap(7)'.PHP_EOL;
dump(s('ana are mere verzi')->wordwrap(7));

// Create slugs from sentences
$slugger = new AsciiSlugger();
print '$slugger->slug("Ana are mere: verzi, roșii și ... pere :)")'.PHP_EOL;
dump($slugger->slug('Ana are mere: verzi, roșii și ... pere :)'));

// No UUID creation feature! You would need to use directly: composer require ramsey/uuid
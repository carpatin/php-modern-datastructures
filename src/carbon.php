<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\Unit;

// Create dates relative to the current moment (timezone argument is optional)
print 'Carbon::now("Europe/Bucharest")->toString()'.PHP_EOL;
dump(Carbon::now('Europe/Bucharest')->toString());

print 'Carbon::yesterday()->toDateString()'.PHP_EOL;
dump(Carbon::yesterday()->toDateString());

print 'Carbon::today()->format ("Y-m-d H:i:s")'.PHP_EOL;
dump(Carbon::today()->format('Y-m-d H:i:s'));

print 'Carbon::tomorrow()->toFormattedDateString()'.PHP_EOL;
dump(Carbon::tomorrow()->toFormattedDateString());

// Parse dates from formatted strings (timezone argument is optional)
print 'Carbon::parse("2025-07-01","Europe/Bucharest")->toDateTimeString()'.PHP_EOL;
dump(Carbon::parse('2025-07-01', 'Europe/Bucharest')->toDateTimeString());

print 'Carbon::createFromFormat("d/m/Y H:i:s", "01/07/2025 10:30:30")->toDateTimeString()'.PHP_EOL;
dump(Carbon::createFromFormat('d/m/Y H:i:s', '01/07/2025 10:30:30')->toDateTimeString());

// Parse dates from a free text description
print 'Carbon::parse("Monday next week")->toDateTimeString()'.PHP_EOL;
dump(Carbon::parse('Monday next week')->toDateTimeString());

print 'Carbon::parse("next Monday")->toDateTimeString()'.PHP_EOL;
dump(Carbon::parse('next Monday')->toDateTimeString());

print 'Carbon::parse("last day of this month")->toDateTimeString()'.PHP_EOL;
dump(Carbon::parse('last day of this month')->toDateTimeString());

// Format dates by custom format or standardized
$date = Carbon::parse('2025-07-01 14:30');
print '$date->format("l jS \of F Y h:i:s A")'.PHP_EOL;
dump($date->format('l jS \of F Y h:i:s A'));
print '$date->toJSON()'.PHP_EOL;
dump($date->toJSON());
print '$date->toArray()'.PHP_EOL;
dump($date->toArray());
print '$date->toAtomString()'.PHP_EOL;
dump($date->toAtomString());
print '$date->toCookieString()'.PHP_EOL;
dump($date->toCookieString());
print '$date->toIso8601String()'.PHP_EOL;
dump($date->toIso8601String());

// Date manipulations and arithmetic
print
    '$date=Carbon::now("Europe/Bucharest");'.PHP_EOL.
    'dump($date->toDateTimeString());'.PHP_EOL.
    '$date->addDays(7)->addHours(12)->addMinutes(30)->addSeconds(15);'.PHP_EOL.
    'dump($date->toDateTimeString())'.PHP_EOL;
$date = Carbon::now('Europe/Bucharest');
dump($date->toDateTimeString());
$date->addDays(7)->addHours(12)->addMinutes(30)->addSeconds(15);
dump($date->toDateTimeString());


print
    '$date=Carbon::now("Europe/Bucharest");'.PHP_EOL.
    'dump($date->toDateTimeString());'.PHP_EOL.
    '$date->addQuarter()->subDay()->floorHours();'.PHP_EOL.
    'dump($date->toDateTimeString())'.PHP_EOL;
$date = Carbon::now('Europe/Bucharest');
dump($date->toDateTimeString());
$date->addQuarter()->subDay()->floorHours();
dump($date->toDateTimeString());

print
    '$date=Carbon::now("Europe/Bucharest");'.PHP_EOL.
    'dump($date->toDateTimeString());'.PHP_EOL.
    '$date->add(Unit::Week,2)->sub(Unit::Day,1)->startOfDay()();'.PHP_EOL.
    'dump($date->toDateTimeString())'.PHP_EOL;
$date = Carbon::now('Europe/Bucharest');
dump($date->toDateTimeString());
$date->add(Unit::Week->value, 2)->sub(Unit::Day->value, 1)->startOfDay();
dump($date->toDateTimeString());


// Doing date differences
print '$dt1 = Carbon::parse("2025-01-01");'.PHP_EOL;
$dt1 = Carbon::parse('2025-01-01');
print '$dt2 = Carbon::parse("2025-07-01");'.PHP_EOL;
$dt2 = Carbon::parse('2025-07-01');
print '$dt1->diffInDays($dt2)'.PHP_EOL;
dump($dt1->diffInDays($dt2));
print '$dt1->diffInHours($dt2)'.PHP_EOL;
dump($dt1->diffInHours($dt2));
print '$dt1->diffInMinutes($dt2)'.PHP_EOL;
dump($dt1->diffInMinutes($dt2));
print '$dt1->diffForHumans($dt2)'.PHP_EOL;
dump($dt1->diffForHumans($dt2));
print '$dt1->isFuture()'.PHP_EOL;
dump($dt1->isFuture());
print '$dt1->isNowOrPast()'.PHP_EOL;
dump($dt1->isNowOrPast());

// Localization
Carbon::setLocale('ro');
print 'Carbon::setLocale("ro"); $dt1->diffForHumans($dt2)'.PHP_EOL;
dump($dt1->diffForHumans($dt2));

// Periods
print '$period = CarbonPeriod::create("2025-01-01", "3 days", "2025-03-01");'.PHP_EOL;
$period = CarbonPeriod::create('2025-01-01', '3 days', '2025-03-01'); // every 3 days from 1st of Jan to 1st of March
print '$period->count()'.PHP_EOL;
dump($period->count());
print 'Iteration of dates in the period:'.PHP_EOL;
foreach ($period as $date) {
    echo $date->toDateString()."\n";
}

// Helpers
print 'Carbon::parse("2025-01-01")->isWeekday()'.PHP_EOL;
dump(Carbon::parse('2025-01-01')->isWeekday());
print 'Carbon::parse("2025-01-01")->isWeekend()'.PHP_EOL;
dump(Carbon::parse('2025-01-01')->isWeekend());
print 'Carbon::parse("2025-01-01")->isSameYear(Carbon::parse("2025-01-02"))'.PHP_EOL;
dump(Carbon::parse('2025-01-01')->isSameYear(Carbon::parse('2025-01-02')));
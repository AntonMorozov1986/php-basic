<?php
function pluralizeNoun($number, $single, $several, $multiple)
{
    $number %= 100;
    if ($number >= 5 && $number <= 20) {
        return $multiple;
    }
    $number %= 10;
    if ($number === 1) {
        return $single;
    }
    if ($number >= 2 && $number <= 4) {
        return $several;
    }
    return $multiple;
}

$hours = rand(0, 24);
$minutes = rand(0, 59);
$hoursNoun = pluralizeNoun($hours, "час", "часа", "часов");
$minutesNoun = pluralizeNoun($minutes, "минута", "минуты", "минут");

echo "$hours $hoursNoun $minutes $minutesNoun";

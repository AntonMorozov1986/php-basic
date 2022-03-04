<?php
function exponentiate($number, $degree)
{
    $absDegree = abs($degree);
    if ($absDegree === 0) {
        return 1;
    }
    if ($degree < 0) {
        return 1 / ($number * exponentiate($number, $absDegree - 1));
    }
    return $number * exponentiate($number, $absDegree - 1);
}

$a = rand(-3, 3);
$b = rand(-5, 5);

echo "a = $a, b = $b<br/>";
echo "$a в степени $b = " . exponentiate($a, $b);

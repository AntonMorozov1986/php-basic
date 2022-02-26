<?php
function add($firstNumber, $secondNumber)
{
    return $firstNumber + $secondNumber;
}

function sub($firstNumber, $secondNumber)
{
    return $firstNumber - $secondNumber;
}

function mul($firstNumber, $secondNumber)
{
    return $firstNumber * $secondNumber;
}

function div($firstNumber, $secondNumber)
{
    if ($secondNumber === 0) {
        return "Деление на ноль запрещено";
    }
    return $firstNumber / $secondNumber;
}

$a = rand(-15, 15);
$b = rand(-15, 15);

echo "a = $a<br/>";
echo "b = $b<br/>";

echo add($a, $b) . "<br/>";
echo sub($a, $b) . "<br/>";
echo mul($a, $b) . "<br/>";
echo div($a, $b) . "<br/>";

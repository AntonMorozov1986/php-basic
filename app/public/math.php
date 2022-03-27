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
    return $secondNumber === 0 ? "Деление на ноль запрещено" : $firstNumber / $secondNumber;
}

function mathOperation($arg1, $arg2, $operation)
{
    return function_exists($operation) ? $operation($arg1, $arg2) : "Такая операция не существует";
}

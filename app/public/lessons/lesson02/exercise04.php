<?php
include "exercise03.php";
echo "<hr/>";

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "add": return add($arg1, $arg2);
        case "sub": return sub($arg1, $arg2);
        case "mul": return mul($arg1, $arg2);
        case "div": return div($arg1, $arg2);
    }
}

function mathOperationSecond($arg1, $arg2, $operation) {
    return $operation($arg1, $arg2);
}

$operationsList = ["add", "sub", "mul", "div"];

foreach ($operationsList as $operation) {
    echo mathOperation($a, $b, $operation) . "<br/>";
}
echo "<hr/>";

foreach ($operationsList as $operation) {
    echo mathOperationSecond($a, $b, $operation) . "<br/>";
}

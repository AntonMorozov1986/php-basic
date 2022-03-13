<?php
$a = rand(-5, 5);
$b = rand(-5, 5);

echo "переменная a = $a, переменная b = $b<br/>";

if ($a >= 0 && $b >= 0) {
    echo "a и b положительные";
} elseif ($a < 0 && $b < 0) {
    echo "a и b отрицательные";
} else {
    echo "a и b разных знаков";
}

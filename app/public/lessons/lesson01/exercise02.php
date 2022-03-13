<?php
echo "<h2>Задание 2: Выполнить примеры из методички и разобраться, как это работает.</h2>";
echo "<hr/>";
echo "<h3>Пример 1 - вывести Hello World</h3>";
echo "Hello, World!";
echo "<hr/>";
echo "<h3>Пример 2 - переменные</h3>";
$name = "anton";
echo "Hello, $name!";
echo "<hr/>";
echo "<h3>Пример 3 - константы</h3>";
define('MY_CONST', 'строка-константа');
echo "моя константа - MY_CONST: ";
echo MY_CONST;
echo "<hr/>";
echo "<h3>Пример 4 - типы данных</h3>";
echo "<br/>";
echo "<h4>Целые числа</h4>";
$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";
echo "<br/>";
echo "<h4>Числа с плавающей запятой</h4>";
$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";
echo "<h4>Строки</h4>";
$a = "Переменная 'a'";
echo "Строка в двойных кавычках <br/>";
echo "это переменная - $a <br/>";
echo "Строка в одинарных кавычках <br/>";
echo 'это переменная - $a <br/>';
echo "<hr/>";
echo "<h3>Пример 5 - приведение типов </h3>";
$a = 10;
$b = (boolean) $a;
echo "это переменная 'a' - $a <br/>";
echo "это переменная 'b' - $b <br/>";
echo "<hr/>";
echo "<h3>Пример 6 - Простейшие операции </h3>";
echo "<h4>Конкатенация строк</h4>";
$a = 'Hello,';
$b = 'world';
$c = $a . $b;
echo $c;
echo "<h4>Математические операции</h4>";
$a = 4;
$b = 5;
echo $a + $b . '<br>';    // сложение
echo $a * $b . '<br>';    // умножение
echo $a - $b . '<br>';    // вычитание
echo $a / $b . '<br>';  // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
echo "<br/>";

$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a;
echo "<br/>";

$a = 0;
echo $a++ . '<br>';     // Постинкремент
echo ++$a . '<br>';    // Преинкремент
echo $a-- . '<br>';     // Постдекремент
echo --$a . '<br>';    // Предекремент
echo "<br/>";

$a = 5;
$b = '5';
var_dump($a == $b) . '<br>';  // Сравнение по значению
var_dump($a === $b) . '<br>'; // Сравнение по значению и типу
$a = 4;
var_dump($a > $b) . '<br>';    // Больше
var_dump($a < $b) . '<br>';    // Меньше
var_dump($a <> $b) . '<br>';  // Не равно
var_dump($a <=> $b) . '<br>';  // Не равно
var_dump($a != $b) . '<br>';   // spaceship - return -1 - less, 0 - equal, 1 - bigger
var_dump($a !== $b) . '<br>'; // Не равно без приведения типов
var_dump($a <= $b) . '<br>';  // Меньше или равно
var_dump($a >= $b) . '<br>';  // Больше или равно

echo "<hr/>";

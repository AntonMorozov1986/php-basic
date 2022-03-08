<?php
/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 1 <=== */
echo "<hr/>";
echo "Exercise 1<br/>";
echo "<br/>";
$counter1 = 0;

while ($counter1 <= 100) {
    if ($counter1 % 3 === 0) {
        echo "$counter1 | ";
    }
    $counter1++;
}

echo "<br/>";
echo "Exercise 1 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 2 <=== */
echo "Exercise 2<br/>";
$counter2 = 0;

function getText($number)
{
    if ($number === 0) {
        return " - это ноль.<br/>";
    }
    return $number % 2 === 0 ? " - это четное число.<br/>" : " - это нечетное число.<br/>";
}
do {
    echo $counter2 . getText($counter2);
    $counter2++;
} while ($counter2 <= 10);

echo "<br/>";
echo "Exercise 2 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 3 <=== */
echo "Exercise 3<br/>";
echo "<br/>";

$regions = [
    "Московская область" => ['Москва', 'Зеленоград', 'Клин', 'Электросталь'],
    "Ленинградская область" => ['Зеленогорск', 'Сестрорецк', 'Всеволожск', 'Гатчина', 'Кириши'],
    "Свердловская область" => ['Екатеринбург', 'Ирбит', 'Нижний Тагил', 'Качканар'],
    "Тюменская область" => ['Тюмень', 'Нижняя Тавда', 'Ялуторовск', 'Ишим'],
    "Ярославская область" => ['Ярославль', 'Мышкин', 'Рыбинск', 'Тутаев']
];

foreach ($regions as $region => $cities) {
    echo "$region:<br/>";
    $citiesList = "";
    foreach ($cities as $city) {
        $citiesList .= "$city, ";
    }
    $citiesList = substr_replace($citiesList, '.', -2, 2);
    echo "$citiesList<br/>";
}

echo "<br/>";
echo "Exercise 3 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 4 <=== */
echo "Exercise 4<br/>";
echo "<br/>";

$alphabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

function transliterationText($text, $alphabet): string
{
    $str = '';
    for ($i = 0; $i < mb_strlen($text); $i++) {
        $originChar = mb_substr($text, $i, 1);
        $lowerCaseChar = mb_strtolower($originChar);
        $translitChar = getTranslitedChar($lowerCaseChar, $alphabet);
        if ($originChar === $lowerCaseChar) {
            $str .= $translitChar;
        } else {
            $str .= mb_strtoupper($translitChar);
        }
    }
    return $str;
}

function getTranslitedChar($char, $alphabet)
{
    if (key_exists($char, $alphabet)) {
        return $alphabet[$char];
    } else {
        return $char;
    }
}

$someText = 'Какой-то текст - Большая и Маленькая БуКвА на Русском!!';
echo $someText . '<br/>';
echo transliterationText($someText, $alphabet) . '<br/>';

echo "<br/>";
echo "Exercise 4 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 5 <=== */
echo "Exercise 5<br/>";
echo "<br/>";

function spaceReplace($string, $replacerChar = '_')
{
    return str_replace(' ', $replacerChar, $string);
}

$str1 = 'test test hello joy fire';
$str2 = 'Hello wonderful world';
echo spaceReplace($str1) . '<br/>';
echo spaceReplace($str2) . '<br/>';

echo "<br/>";
echo "Exercise 5 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 6 <=== */
echo "Exercise 6<br/>";
echo "<br/>";

echo "<a href='./exercise06/index.php'>Упражнение 6</a><br/>";

echo "<br/>";
echo "Exercise 6 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 7 <=== */
echo "Exercise 7<br/>";
echo "<br/>";

for ($i = 0; $i < 10; printf($i++));

echo "<br/>";
echo "Exercise 7 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 8 <=== */
echo "Exercise 8<br/>";
echo "<br/>";

foreach ($regions as $region => $cities) {
    echo "$region:<br/>";
    $citiesList = "";
    foreach ($cities as $city) {
        $firstChar = mb_substr($city, 0, 1);
        if (mb_strtolower($firstChar) !== 'к') {
            continue;
        }
        $citiesList .= "$city, ";
    }
    if (mb_strlen($citiesList) > 0) {
        $citiesList = substr_replace($citiesList, '.', -2, 2);
    }
    echo "$citiesList<br/>";
}

echo "<br/>";
echo "Exercise 8 end<br/>";
echo "<hr/>";

/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */

/* ===> Exercise 9 <=== */
echo "Exercise 9<br/>";
echo "<br/>";

function textToURL($text, $alphabet)
{
    return spaceReplace(transliterationText($text, $alphabet));
}

$text = 'Название статьи моего блога';

echo "text: $text <br/>";
echo "result: " . textToURL($text, $alphabet);
echo '<br/>';

echo "<br/>";
echo "Exercise 9 end<br/>";
echo "<hr/>";

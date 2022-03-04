<?php
$title = "Главная страница - страница обо мне";
$heading = "Информация обо мне";
$currentYear = date ('Y');
$imgSrc = "images/bee.jpg";

$content = file_get_contents("exercise04-3-template.html");

$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ heading }}", $heading, $content);
$content = str_replace("{{ currentYear }}", $currentYear, $content);
$content = str_replace("{{ imgSrc }}", $imgSrc, $content);

echo $content;

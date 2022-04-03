<?php
include './dbConnection.php';
const GOODS_IMG = './goods_images';

function getGood()
{
    $goodId = (int) $_GET['id'];
    return getDb()->query("SELECT * FROM goods WHERE id = $goodId");
}
$good = mysqli_fetch_assoc(getGood());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson05</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/catalog.php">Назад</a>
    <img src="<?=GOODS_IMG . '/' . $good['image']?>"  width="600"/>
    <h3>Наименование: <?=$good['name']?></h3>
    <h4>Цена: <?=$good['price']?> руб.</h4>
    <p>Описание: <?=$good['description'] ?? 'Описание товара будет позже'?></p>
</div>
</body>
</html>

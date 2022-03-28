<?php
include './dbConnection.php';
const GOODS_IMG = './goods_images/';

function getGoodsList() {
    return getDb()->query('SELECT * FROM goods');
}

$goods = getGoodsList();
var_dump($_SERVER['DOCUMENT_ROOT']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>catalog</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <h1>Каталог товаров</h1>
    <div class="goods">
        <?php while ($good = $goods->fetch_assoc()):?>
            <div class="good">
                <a class="good__description" href="./good.php?id=<?=$good['id']?>">
                    <img src="<?=GOODS_IMG . $good['image']?>" width="150" />
                    <div class="good__text">
                        <h3><?=$good['name']?></h3>
                        <h4><?=$good['price']?> руб.</h4>
                    </div>
                </a>
                <button class="good__buy-button" data-good-id="<?=$good['id']?>">Купить</button>
            </div>
        <?php endwhile;?>
    </div>
</div>
<script src="./addGoodToCart.js"></script>
</body>
</html>

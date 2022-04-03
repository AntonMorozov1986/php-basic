<?php
include './dbConnection.php';
const GOODS_IMG = './goods_images/';
session_start();

function getCart()
{
    $sessionId = session_id();
    $query = "
        SELECT 
               cart.id as id,
               goods.name as name,
               goods.image as image,
               goods.price as price
        FROM `cart`
            JOIN `goods` ON goods.id = cart.good_id
        WHERE session_id = '$sessionId'
        ";

    return getDb()
        ->query($query)
        ->fetch_all(MYSQLI_ASSOC);
}

$cart = getCart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>cart</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <a href="./catalog.php">Catalog</a>
    <h1>Корзина товаров</h1>
    <?php if (empty($cart)) echo "<h2>Ваша корзина пуста. <a href='./catalog.php'>Перейти в каталог</a></h2>" ?>
    <div class="goods">
        <?php foreach ($cart as $good):?>
            <div class="good">
                <a class="good__description" href="./good.php?id=<?=$good['id']?>">
                    <img src="<?=GOODS_IMG . $good['image']?>" width="150" alt="Наименование товара: <?=$good['name']?>"/>
                    <div class="good__text">
                        <h3><?=$good['name']?></h3>
                        <h4><?=$good['price']?> руб.</h4>
                    </div>
                </a>
                <button class="good__delete-button" data-good-id="<?=$good['id']?>">Удалить из корзины</button>
            </div>
        <?php endforeach;?>
    </div>
</div>
<script src="./js/sendRequest.js"></script>
<script src="./js/deleteGoodFromCart.js"></script>
</body>
</html>

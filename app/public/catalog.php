<?php
include './dbConnection.php';
const GOODS_IMG = './goods_images/';

session_start();

function getGoodsList() {
    return getDb()
        ->query('SELECT * FROM goods')
        ->fetch_all(MYSQLI_ASSOC);
}

$goods = getGoodsList();
var_dump($_SESSION);
var_dump(session_id());
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
    <?php if($_SESSION['user']):?>
        <span>Добро пожаловать, <?=$_SESSION['user']?></span>
        <a href="/logout.php">Выйти</a>
    <?php else:?>
        <a href="/login.php">Войти</a>
    <?php endif;?>
    <?php if ($_SESSION['role'] === 'admin'):?>
        <a href="/orders.php">Заказы</a>
    <?php endif;?>
    <hr/>
    <a href="./cart.php">Корзина</a>
    <p>Товаров в корзине: <span id="cart-amount"></span></p>
    <h1>Каталог товаров</h1>
    <div class="goods">
        <?php foreach ($goods as $good):?>
            <div class="good">
                <a class="good__description" href="./good.php?id=<?=$good['id']?>">
                    <img src="<?=GOODS_IMG . $good['image']?>" width="150" alt="Наименование товара: <?=$good['name']?>"/>
                    <div class="good__text">
                        <h3><?=$good['name']?></h3>
                        <h4><?=$good['price']?> руб.</h4>
                    </div>
                </a>
                <button class="good__buy-button" data-good-id="<?=$good['id']?>">Купить</button>
            </div>
        <?php endforeach;?>
    </div>
</div>
<script src="./js/sendRequest.js"></script>
<script src="./js/addGoodToCart.js"></script>
<script src="./js/getCartAmount.js"></script>
</body>
</html>

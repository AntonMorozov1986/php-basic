<?php
include './dbConnection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: /catalog.php");
    die();
}

function getOrders()
{
    $query = "
        SELECT 
               orders.id as id,
               orders.user_login as user,
               orders.session_id as session,
               orders.good_fixed_price as order_price,
               goods.id as good_id,
               goods.price as current_price,
               goods.name as good_name
        FROM orders
        JOIN goods ON goods.id = orders.good_id
        ORDER BY session
    ";

    return getDb()
        ->query($query)
        ->fetch_all(MYSQLI_ASSOC);
}
$orders = getOrders();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>orders</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main-page">
    <a href="/">Home</a>
    <a href="/catalog.php">Catalog</a>
    <hr>
    <?php if (empty($orders)):?>
    <h4>Заказы отсутствуют</h4>
    <?php else:?>
    <table cellspacing="2" border="1">
        <tr>
            <th>order id</th>
            <th>user name</th>
            <th>session id</th>
            <th>good id</th>
            <th>good name</th>
            <th>order price</th>
            <th>current price</th>
        </tr>
        <?php foreach ($orders as $order):?>
            <tr>
                <td><?=$order['id']?></td>
                <td><?=$order['user']?></td>
                <td><?=$order['session']?></td>
                <td><?=$order['good_id']?></td>
                <td><?=$order['good_name']?></td>
                <td><?=$order['order_price']?></td>
                <td><?=$order['current_price']?></td>
                <td>
                    <button class="delete-order-button" data-order-id="<?=$order['id']?>">заказ выполнен (удалит из таблицы)</button>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php endif;?>
</div>
<script src="./js/sendRequest.js"></script>
<script src="./js/deleteOrder.js"></script>
</body>
</html>

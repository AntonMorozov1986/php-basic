<?php
include '../dbConnection.php';
session_start();

$status = 'pending';

function getUserCart()
{
    $sessionId = session_id();
    $query = "
        SELECT 
               cart.id as id,
               cart.session_id as session_id,
               cart.good_id as good_id,
               goods.price as price
        FROM `cart`
            JOIN `goods` ON goods.id = cart.good_id
        WHERE session_id = '$sessionId'
        ";
    return getDb()
        ->query("$query")
        ->fetch_all(MYSQLI_ASSOC);
}

function transferGoodsIntoOrders($userCart, &$status)
{
    foreach ($userCart as $good) {
        [
            'session_id' => $sessionId,
            'good_id' => $goodId,
            'price' => $price
        ] = $good;
        $userLogin = $_SESSION['user'];
        $query = "
            INSERT INTO orders (session_id, good_id, good_fixed_price, user_login)
            VALUES ('$sessionId','$goodId', '$price', '$userLogin')
            ";
        $status = getDb()->query($query) ? 'success' : 'error';
    }
}

function deleteGoodsFromCart($userCart, &$status)
{
    foreach ($userCart as $good) {
        ['id' => $goodId] = $good;
        $query = "DELETE FROM cart WHERE id = '$goodId'";
        $status = getDb()->query($query) ? 'success' : 'error';
    }
}

$userCart = getUserCart();

if (!empty($userCart)) {
    transferGoodsIntoOrders($userCart, $status);
}

if ($status === 'success') {
    deleteGoodsFromCart($userCart, $status);
}



$response = [
    'status' => $status,
];
header('Content-Type: application/json');
echo json_encode($response);

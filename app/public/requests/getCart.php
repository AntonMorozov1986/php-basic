<?php
include '../dbConnection.php';
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
    $result = getDb()
        ->query($query)
        ->fetch_all(MYSQLI_ASSOC);;
    return $result;
}

echo json_encode(getCart()[0]);

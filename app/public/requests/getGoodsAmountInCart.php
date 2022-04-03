<?php
include '../dbConnection.php';
session_start();

function getGoodsAmountInCart()
{
    $sessionId = session_id();
    $result = getDb()
        ->query("SELECT COUNT(session_id) AS amount FROM `cart` WHERE session_id='$sessionId' GROUP BY session_id")
        ->fetch_all(MYSQLI_ASSOC);;
    return $result;
}

echo json_encode(getGoodsAmountInCart()[0]);
